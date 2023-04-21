const slider = document.querySelector('.slider');
if (slider !== null) {
const trail = document.querySelector('.trail').querySelectorAll('div');
const imageCount = slider.getAttribute('data-images-count');

const initWidth = (IC) => {
  const W = 100 * IC;
  slider.style.width = `${W}%`;
};
initWidth(imageCount);

let value = 0;
let trailValue = 0;
const interval = 4000;

let start = setInterval(() => slide('increase'), interval);

const slide = (condition) => {
  clearInterval(start);
  condition === 'increase' ? initiateINC() : initiateDEC();
  move(imageCount, trailValue);
  animate();
  start = setInterval(() => slide('increase'), interval);
};

const initiateINC = () => {
  trail.forEach((cur) => cur.classList.remove('active'));
  value === imageCount * 20 - 20 ? value = 0 : value += 20;
  trailUpdate();
};

const initiateDEC = () => {
  trail.forEach((cur) => cur.classList.remove('active'));
  value === 0 ? value = imageCount * 20 - 20 : value -= 20;
  trailUpdate();
};

const move = (S, T) => {
  const P = (100 / S) * T;
  initWidth(S);
  slider.style.transform = `translateX(-${P}%)`;
  trail[T].classList.add('active');
};

const tl = gsap.timeline({ defaults: { duration: 0.6, ease: 'power2.inOut' } });
tl.from('.bg', { x: '-100%', opacity: 0 })
  .from('p', { opacity: 0 }, '-=0.3')
  .from('h1', { opacity: 0, y: '30px' }, '-=0.3')
  .from('.link', { opacity: 0 }, '-=0.8');

const animate = () => tl.restart();

const trailUpdate = () => {
  trailValue = (value + 20) / 20 - 1;
//   console.log(`trailValue =${trailValue}`);
};

document.querySelectorAll('svg').forEach((cur) => {
  cur.addEventListener('click', () => (cur.classList.contains('next') ? slide('increase') : slide('decrease')));
});

const clickCheck = (e) => {
  clearInterval(start);

  trail.forEach((cur) => cur.classList.remove('active'));

  const check = e.target;
  const dataValue = check.getAttribute('data-value');

  check.classList.add('active');

  if (dataValue - 1) {
    value = dataValue * 20 - 20;
  } else {
    value = 0;
  }

  trailUpdate();
  move(imageCount, trailValue);
  animate();
  start = setInterval(() => slide('increase'), interval);
};

trail.forEach((cur) => cur.addEventListener('click', (ev) => clickCheck(ev)));

const touchSlide = (() => {
  let start; let move; let change; let
    sliderWidth;

  slider.addEventListener('touchstart', (e) => {
    start = e.touches[0].clientX;
    sliderWidth = slider.clientWidth / trail.length;
  });

  slider.addEventListener('touchmove', (e) => {
    e.preventDefault();
    move = e.touches[0].clientX;
    change = start - move;
  });

  const mobile = () => {
    change > (sliderWidth / 4) ? slide('increase') : null;
    (change * -1) > (sliderWidth / 4) ? slide('decrease') : null;
    [start, move, change, sliderWidth] = [0, 0, 0, 0];
  };
  slider.addEventListener('touchend', mobile);
})()
};
