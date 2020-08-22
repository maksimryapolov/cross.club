<template>
    <div>
        <div class="b-popup-bg b-open-bg" @click="closeModal"></div>
        <transition name="popup" v-on:after-leave="afterLeave">
            <div class="b-popup b-open-bg" v-if="modal">
                <button class="b-popup__close" @click="closeModal">&times;</button>

                <div class="b-popup__container">
                    <h4 class="b-popup__title">
                        Заказать обратный звонок
                    </h4>
                    <div class="b-popup__description">
                        Оставьте номер телефона и&nbsp;наши менеджеры свяжутся с&nbsp;Вами в&nbsp;ближайшее время
                    </div>
                    <slot></slot>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        name: "modal",
        props: ['show'],
        data() {
            return {
                modal: this.show
            }
        },
        methods: {
            afterLeave() {
                this.$emit('close-modal')
            },
            closeModal() {
                this.modal = !this.modal
            }
        },
        watch: {
           show(vNew) {
               this.modal = vNew;
           }
        }
    }
</script>

<style scoped lang="scss">
    .b-popup-bg {
        z-index: 100;
    }

    .b-popup__container {
        color: black;
        .b-popup__title {
            font-size: 2rem;
        }
        .b-popup__description {
            font-size: 1.2rem;
            font-weight: bold;
        }
    }

    .popup-enter {
        opacity: 0;
    }

    .popup-enter {
        transform: translate(-50%, -180%);
    }

    .popup-leave-to {
        transform: translate(-50%, 30%);
        opacity: 0;
    }

    .popup-enter-active, .popup-leave-active {
        transition: all .25s ease-in;
    }

    .popup-enter-to {
        opacity: 1;
    }
</style>