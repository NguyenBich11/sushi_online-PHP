// Toggle Menu Function
function toggleMenu() {
    document.getElementById("navLinks").classList.toggle("active");
}

// Coupon card 

const coupons = [
    {
        img: 'View/images/img1.jpg',
        name: 'Fried Fish', 
        oldPrice: '$25.44',
        newPrice: '$19.99'
    },
    {
        img: 'View/images/img2.jpg',
        name: 'Fish Nuggets', 
        oldPrice: '$22.73',
        newPrice: '$17.99'
    },
    {
        img: 'View/images/img3.jpg',
        name: 'Fish Breast', 
        oldPrice: '$32.23',
        newPrice: '$28.55'
    },
];

let currentCouponIndex = 0;  
 
const couponImage = document.querySelector('.coupon-image');
const couponName = document.querySelector('.coupon-details h3');
const oldPrice = document.querySelector('.coupon-details .price');
const newPrice = document.querySelector('.coupon-details .discounted-price');
 
function updateCoupon(index) {
    const coupon = coupons[index];
    couponImage.style.backgroundImage = `url(${coupon.img})`;  
    couponName.textContent = coupon.name;                  
    oldPrice.textContent = coupon.oldPrice;               
    newPrice.textContent = coupon.newPrice;                 
}
 
document.getElementById('next-btn').addEventListener('click', function () {
    currentCouponIndex = (currentCouponIndex + 1) % coupons.length;  
    updateCoupon(currentCouponIndex);  
});
  
document.getElementById('prev-btn').addEventListener('click', function () {
    currentCouponIndex = (currentCouponIndex - 1 + coupons.length) % coupons.length;  
    updateCoupon(currentCouponIndex); 
});
 
updateCoupon(currentCouponIndex);


// AOS animatio

AOS.init({
    duration: 2000,
    offset: 50
});