
    

    <div class="">
        <form method="post" id="payment-form" action="{{ url('/checkout') }}">
            <div class="modal-body">
                @csrf
                <section>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Nome Piatto</th>
                                <th scope="col">Prezzo</th>
                                <th scope="col">Quantità</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in cart">
                                <td>@{{item.name_food}}</td>
                                <td>@{{item.price.toFixed(2)}}</td>
                                <td>@{{item.quantity}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex flex-column">
                        <label for="name">Nome sul citofono</label>
                        <input type="text" id="name" name="name">
                        <label for="email">E-mail</label>
                        <input type="text" id="email" name="email">
                        <label for="address">Indirizzo di consegna</label>
                        <input type="text" id="address" name="address">
                        <label for="date">Ora di consegna</label>
                        <input type="datetime-local" id="date" name="delivery_time">
                        <label for="phone">Numero di telefono</label>
                        <input type="text" id="phone" name="phone">
                    </div>
                    <input type="hidden"name="restaurant" value="{{$restaurant->id}}">
                    <template v-for="item in cart">
                        <input type="hidden" name="food[]" :value="item.id">
                        <input type="hidden" name="quantity[]" :value="item.quantity">
                    </template>
                    <label for="amount">
                        <span class="input-label">Totale</span>
                        <div class="input-wrapper amount-wrapper">
                            <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" v-model="totalPrice" readonly>
                        </div>
                    </label>

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="btn btn-primary" type="submit"><span>Conferma Pagamento</span></button>
            </div>

        </form>
    </div>


    <script type="application/javascript">
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";

        braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
            paypal: {
            flow: 'vault'
            }
        }, function (createErr, instance) {
            if (createErr) {
            console.log('Create Error', createErr);
            return;
            }
            form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                console.log('Request Payment Method Error', err);
                return;
                }

                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
            });
            });
        });
    </script>