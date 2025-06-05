 // Testimonial Carousel
 const cards = document.querySelectorAll('.testimonial-card');
 const dots = document.querySelectorAll('.carousel-dot');
 const prevBtn = document.querySelector('.carousel-btn.prev');
 const nextBtn = document.querySelector('.carousel-btn.next');
 let current = 0;

 function showCard(index) {
   cards.forEach(card => card.classList.remove('active'));
   dots.forEach(dot => dot.classList.remove('active'));
   cards[index].classList.add('active');
   dots[index].classList.add('active');
 }

 prevBtn.addEventListener('click', () => {
   current = (current - 1 + cards.length) % cards.length;
   showCard(current);
 });

 nextBtn.addEventListener('click', () => {
   current = (current + 1) % cards.length;
   showCard(current);
 });

 dots.forEach((dot, i) => {
   dot.addEventListener('click', () => {
     current = i;
     showCard(current);
   });
 });

//  
AOS.init({
    duration: 800,
    once: true
  });