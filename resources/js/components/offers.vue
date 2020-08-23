<template>
    <div class="sizes">
        <div class="sizes__wrapper">
            <div :class="{open: open}"
                class="sizes__dropdown">
                <label class="sizes__title"
                       :data-value="params.id"
                       @click="changeToggle"
                >
                    {{ params.size ? params.size : title }}
                </label>
                <ul class="sizes__block">
                    <li class="sizes__item" v-for="offer in offers"
                        :data-value="offer.id"
                        :key="offer.id"
                        @click="chooseItem(offer)"
                    >
                        {{ offer.size }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "offers",
        props: ['offers'],
        data() {
            return {
                open: false,
                title: 'Выберите размер',
                params: {
                    size: 0,
                    price: 0,
                    id: 0,
                    product_id: 0
                }
            }
        },
        methods: {
            changeToggle() {
                this.open = !this.open;
            },
            chooseItem(item) {
                this.params.size = item.size;
                this.params.id = item.id;
                this.params.price = item.price;
                this.params.product_id = item.product_id;
                this.params.quantity = item.quantity;
                this.$emit('choose-size', this.params);
                this.changeToggle();
            }
        }
    }
</script>

<style scoped lang="scss">
    .sizes {
        font-size: 1rem;
        &__wrapper {
            display: flex;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        &__dropdown {
            margin: 0 auto;
            position: relative;
            max-width: 400px;
        }

        &__title {
            width: 163px;
            display: block;
            padding: 8px 16px;
            border: 1px solid #6bbd14;
            cursor: pointer;
            border-radius: 45px;
            margin-bottom: 0;

        }

        &__block {
            list-style: none;
            position: absolute;
            width: 100%;
            z-index: 2;
        }

        &__item {
            padding: 0px 16px;
            background: #fff;
            color: #343838;
            text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.8);
            height: 0px;
            overflow: hidden;
            cursor: pointer;
            transition: height 0.1s linear 0s;

            &:hover,
            &.selected {
                background: #24bed3;
                color: #FAFAFA;
                border-left: 2px solid #6bbd14 !important;
                text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
            }
        }

        .open {
            .sizes__title {
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }
        }

        .open {
            .sizes__item {
                padding: 8px 16px;
                height: 34px;
                border: 1px solid #6bbd14;
                border-top: none;
                transition: .2s;
            }

            .sizes__item:last-child {
                border-bottom-left-radius: 30px;
                border-bottom-right-radius: 30px;
            }
        }
    }
</style>