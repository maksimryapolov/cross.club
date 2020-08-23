export default function quantity(count) {
    if(typeof count === 'undefined') {
        return;
    }
    return count ? `В наличии: ${count}` : 'Нет в наличии';
}