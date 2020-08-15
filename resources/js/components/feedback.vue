<template>
    <div>
        <a @click.prevent="toggleModal()" href="javascript:void(0)" data-popup="#header_modal-question" class="advantages-main__btn popup button_servis">
            Получить консультацию
        </a>
        <modal :class="{hide: !openBg}" :show="openBg" @close-modal="toggleModal()">
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
                    <input type="hidden" name="name" value="feedback" />
                    <input class="popup-form__in maskphone" 
                            type="text" 
                            name="client" 
                            placeholder="Введите имя..."
                            autocomplete="off"
                            required=''
                            v-model='client'
                    />
                    <input class="popup-form__in" type="email" name="email" autocomplete="off" required='' placeholder="Введите email...">
                    <input class="popup-form__in maskphone" v-mask="'+7 (999) 999 99-99'" type="text" name="phone" placeholder="Введите номер телефона...">
                    <textarea class="popup-form__in textarea" name="message" placeholder="Введите ваш вопрос..." cols="10" rows="10"></textarea>
                    <button class="popup-form__btn">Перезвоните мне</button>
                </form>
            </div>
            <div v-else class="success">
                <div id="success"></div>
            </div>
        </modal>
    </div>
    
</template>

<script>
import modal from './modal';
import TypeIt from "typeit";

export default {
    name: 'feedback',
    data() {
      return {
        openBg: false,
        response: false,
        formErrors: [],
        client: ''
      }  
    },
    components: {
        modal
    },
    methods: {
        toggleModal() {
            this.openBg = !this.openBg;

            if(this.openBg) {
                $('.carousel').carousel('pause')
            } else {
                $('.carousel').carousel('cycle')
            }
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
        validNumber(num) {
            return /\+7 \(\d{3}\) \d{3} \d{2}-\d{2}/.test(num);            
        },
        validEmail(email) {
            let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
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
    }
}
</script>

<style lang="scss" scoped>
    .hide {
        display: none;
    }

    .errors {
        &__title {
            margin-bottom: 10px;
            padding-bottom: 5px;
            font-weight: bold;
            border-bottom: 1px solid rgba(0, 0, 0, .2);
        }
    }

    .success {
        font-size: 2rem;
        color: #057804;
    }
</style>