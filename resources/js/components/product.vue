<template>
        <div class="row products">
        <div class="lds-spinner" v-if="products.length < 1"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        <div  v-else class="products__main col-10 col-lg-4 col-md-6" v-for="product in aProducts" :key="product.id">
            <div class="products__item">
                <div class="products__image" :style="{backgroundImage: `url(${product.image})`}"></div>
                <p class="products__name">
                    {{ product.name }}
                </p>
                <div class="products__bottom">
                    <span class="products__price">
                        Цена:&nbsp;{{ product.price }}&nbsp;руб.
                    </span>
                    <offers
                            v-if="checkCountOffer(product)"
                            v-bind:offers="product.offers"
                            @choose-size="setParamsOffer"
                    ></offers>
                    <div v-else>Похоже этот товар<br/> закончился 😢</div>
                </div>
                <a href="javascrip:void(0)"
                @click.prevent="openModal(product.id)"
                data-popup="#header_modal-product" class="catalog-product__btn button_servis popup"
                >
                    Заказать
                </a>
                <modal @close-modal="closeModal(product, $event)" :style="{display: `${product.showModal ? 'block' : 'none'}`}" :show="product.showModal">
                    <div v-if="!response">
                        <div class="errors" v-if="formErrors.length > 0">
                            <div class="errors__title">Пожалуйста исправьте указанные ошибки:</div>
                            <ol class="alert alert-danger">
                                <li v-for="(error, index) in formErrors" :key="index">
                                    {{ error }}
                                </li>
                            </ol>
                        </div>
                        <form action="" class="popup-form" @submit.prevent="sendData($event)">
                            <input type="hidden" name="name" value="feedback_product" />
                            <input class="popup-form__in"
                                    type="text" 
                                    name="client" 
                                    placeholder="Введите имя..."
                                    autocomplete="off"
                                    required=''
                                v-model='client'
                                    
                            />
                            <input class="popup-form__in" type="email" name="email" autocomplete="off" required='' placeholder="Введите email...">
                            <input class="popup-form__in maskphone" v-mask="'+7 (999) 999 99-99'" type="text" name="phone" autocomplete="off" placeholder="Введите номер телефона...">

                            <div class="info-product row">
                                <div class="col-md-3">
                                    <div class="info-product__icon "></div>
                                </div>
                                <div class="info-product__content col-md-9">
                                    <div class="info-product__title">
                                        <div>
                                            {{ product.name }}:
                                        </div>
                                        <div>
                                            {{ product.currentSize || 'Без размера' }}
                                        </div>
                                    </div>
                                    <div class="info-product__price">
                                        <div>
                                            Цена:
                                        </div>
                                        <div>
                                            {{ product.price }}&nbsp;₽
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="popup-form__btn">Перезвоните мне</button>
                        </form>
                    </div>
                    <div v-else="response" class="success">
                        <div id="success"></div>
                    </div>
                </modal>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import TypeIt from "typeit";
import offers from './offers';
import modal from './modal';


export default {
    name: 'app',
    data() {
        return {
            products: [],
            openBg: false,
            formErrors: [],
            response: false,
            client: ''
        }
    },
    components: {
        offers,
        modal
    },
    methods: {
        getData() {

            axios.get('/api').then(res => {
                this.products = res.data.products;
            });

        },
        checkCountOffer(item) {
            return item.offers.length >= 1;
        },
        setParamsOffer(offer) {
            this.products.forEach((item) => {
                if(offer.product_id === item.id) {
                    if(offer.price > 0) {
                        if(item.id === offer.product_id && item.price !== offer.price){
                            item.price = offer.price;
                        }
                    } else {
                        item.price = item.basePrice;
                    }
                    item.currentSize = offer.size;
                }                
            });
        },
        openModal(id) {
            this.formErrors = [];
            this.response = false;

            this.products.forEach((el) => {
                if(el.id == id) {
                    el.showModal = true;
                }
            });
        },
        closeModal(product) {
            product.showModal = false;
        },
        checkValidFields(form) {
            this.formErrors = [];

            if(!form.find('[name="client"]').val()) {
                this.formErrors.push('Поле «Имя» обязательно для заполнения');
            }

            if(!this.validNumber(form.find('[name="phone"]').val())) {
                this.formErrors.push('Неверный формат номера телефона');
            }

            if(!this.validEmail(form.find('[name="email"]').val())) {
                this.formErrors.push('Укажите корректный адрес электронной почты.');
            }

            return this.formErrors.length === 0;
        },
        handlerResult() {
            let str = ` ${this.client}, Ваша зявка принята! `;
            new TypeIt('#success', {
                speed: 75,
                cursorSpeed: 2000,
                waitUntilVisible: true
            }).type(`СпасибА${str}`, {delay: 500})
               .move(-str.length)
               .delete(1)
               .type('о')
               .move('END')
               .type("Наши менеджеры скоро с вами свяжутся", {delay: 500})
               .move(-12)
               .delete(1)
               .type('В')
               .move('END')
               .move(0)
               .type('😊')
               .go();
        },
        sendData(e) {
            const form = $(e.target);

            if(this.checkValidFields(form)) {
                axios.post('/feedback', form.serialize())
                    .then((res) => {
                        if(res.data.response) {
                            this.response = true;
                        }
                    })
                    .then(() => {
                        this.handlerResult()
                    }).catch((e) => {
                        const errorsMsg = e.response.data.errors;
                        for(let key in errorsMsg) {
                            this.formErrors.push(...errorsMsg[key]);
                        }
                });
            }
        },
        
        validNumber(num) {
            return /\+7 \(\d{3}\) \d{3} \d{2}-\d{2}/.test(num);            
        },
        validEmail(email) {
            let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    },
    computed: {
         aProducts: vm => vm.products,
    },
    
    mounted() {
        this.getData();
    }

}
</script>

<style scoped lang="scss">
    .products {
        display: flex;
        justify-content: center;

        &__item {
            background-color: #fff;
            padding: 20px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: none;
            transition: box-shadow .2s linear;
            margin-bottom: 30px;

            &:hover {
                box-shadow: 0px 0px 25px 0px rgba(50,50,50,0.3);
            }
        }

        &__name {
            font-family: Arial, Helvetica, sans-serif;
            color: rgba(51,51,51, .85);
            font-size: 1.2em;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(204, 204, 204, 0.719);
            margin: 30px 0;
        }

        &__image {
            width: 100%;
            height: 200px;
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
        }

        &__bottom {
            display: flex;
            justify-content: space-around;
            align-items: center;
            @media all and (max-width: 576px) {
                flex-direction: column;
            }
        }

        &__price {
            font-size: 1.22em;
            @media all and (max-width: 576px) {
                margin-bottom: 5px;
            }
        }

        .success {
            font-size: 2rem;
            color: #057804;
        }

        .errors {
            &__title {
                margin-bottom: 10px;
                padding-bottom: 5px;
                font-weight: bold;
                border-bottom: 1px solid rgba(0, 0, 0, .2);
            }
        }
        .info-product {
            display: flex;
            width: 100%;
            align-items: flex-end;
            margin-bottom: 20px;

            &__icon {
                background-image: url("../../images/svg/feet.svg");
                width: 100px;
                height: 50px;
                background-position: center;
            }

            &__content {
                font-size: 1.2rem;
            }

            &__title {
                margin-bottom: 12px;
            }

            &__title,
            &__price {  
                display: flex;
                justify-content: space-between;
                position: relative;

                &::after {
                    content: '';
                    position: absolute;
                    bottom: 0;
                    border-bottom: 1px dotted black;
                    width: 100%;
                }
            }
        }

        /* loader */
        .lds-spinner {
            color: official;
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }
        .lds-spinner div {
            transform-origin: 40px 40px;
            animation: lds-spinner 1.2s linear infinite;
        }
        .lds-spinner div:after {
        content: " ";
            display: block;
            position: absolute;
            top: 3px;
            left: 37px;
            width: 6px;
            height: 18px;
            border-radius: 20%;
            background: #057804;
        }
        .lds-spinner div:nth-child(1) {
            transform: rotate(0deg);
            animation-delay: -1.1s;
        }
        .lds-spinner div:nth-child(2) {
            transform: rotate(30deg);
            animation-delay: -1s;
        }
        .lds-spinner div:nth-child(3) {
            transform: rotate(60deg);
            animation-delay: -0.9s;
        }
        .lds-spinner div:nth-child(4) {
            transform: rotate(90deg);
            animation-delay: -0.8s;
        }
        .lds-spinner div:nth-child(5) {
            transform: rotate(120deg);
            animation-delay: -0.7s;
        }
        .lds-spinner div:nth-child(6) {
            transform: rotate(150deg);
            animation-delay: -0.6s;
        }
        .lds-spinner div:nth-child(7) {
            transform: rotate(180deg);
            animation-delay: -0.5s;
        }
        .lds-spinner div:nth-child(8) {
            transform: rotate(210deg);
            animation-delay: -0.4s;
        }
        .lds-spinner div:nth-child(9) {
            transform: rotate(240deg);
            animation-delay: -0.3s;
        }
        .lds-spinner div:nth-child(10) {
            transform: rotate(270deg);
            animation-delay: -0.2s;
        }
        .lds-spinner div:nth-child(11) {
            transform: rotate(300deg);
            animation-delay: -0.1s;
        }
        .lds-spinner div:nth-child(12) {
            transform: rotate(330deg);
            animation-delay: 0s;
        }
        @keyframes lds-spinner {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

    }
</style>