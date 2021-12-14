window.onload = function () {

    var swiper = new Swiper(".teamSwiper", {
        slidesPerView: 6,
        spaceBetween: 30,
        speed: 800,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            767: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 30,
            },
            1200: {
                slidesPerView: 6,
                spaceBetween: 30,
            },
        }
    });



    document.querySelector('.close_menu').addEventListener('click', function () {
        this.closest('.menu_list').classList.remove('active');
        document.querySelector('body').style.overflow = 'initial';
        document.querySelector('body').classList.remove('black');
    })

    document.querySelector('.menu_btn').addEventListener('click', function () {
        document.querySelector('.menu_list').classList.add('active');
        document.querySelector('body').style.overflow = 'hidden';
        document.querySelector('body').classList.add('black');


    })

    for (const item of document.querySelectorAll('.menu_list .menu_link')) {
        item.addEventListener('click', function () {
            this.closest('.menu_list').classList.remove('active');
            document.querySelector('body').style.overflow = 'initial';
            document.querySelector('body').classList.remove('black');
        })
    }

    for (const item of document.querySelectorAll('.video_btn')) {

        item.addEventListener('click', function (e) {
            e.preventDefault();
            Fancybox.show(
                [
                    {
                        src: this.getAttribute("href"),
                        type: "iframe",
                    },
                ],
            );
        })
    }

    // for (const item of document.querySelectorAll('a.modal')) {

    //     item.addEventListener('click', function (e) {
    //         e.preventDefault();
    //         Fancybox.show(
    //             [
    //                 {
    //                     src: '#modal',
    //                     type: "inline",
    //                 },
    //             ],
    //         );
    //     })
    // }

    // for (const item of document.querySelectorAll('.btn-toggle')) {

    //     item.addEventListener('click', function () {
    //         let container = this.closest('.row').querySelector('.answer');

    //         if (container.classList.contains('active')) {
    //             container.classList.remove('active');
    //             this.classList.remove('active');
    //             container.style.maxHeight = 0;
    //         } else {
    //             container.classList.add('active');
    //             this.classList.add('active');
    //             container.style.maxHeight = container.scrollHeight + 'px';
    //         }

    //     })
    // }

    document.addEventListener('click', function (e) {
        console.log(e.target);
        if (e.target.classList.contains('fqa_js')) {
            if (e.target.parentElement.classList.contains('active')) {
                e.target.parentElement.classList.remove('active');
                e.target.nextElementSibling.style.maxHeight = 0;
            } else {
                e.target.parentElement.classList.add('active');
                e.target.nextElementSibling.style.maxHeight = e.target.nextElementSibling.scrollHeight + 'px';

            }
        }
    });

    for (const item of document.querySelectorAll('.tabs .button')) {
        item.addEventListener('click',function (){
            for (const i of document.querySelectorAll('.tabs .button')){
                i.classList.remove('on');
                i.closest('.section').classList.remove(`${i.classList[0]}`);
            }
            this.classList.add('on');
            item.closest('.section').classList.add(`${item.classList[0]}`);
            document.querySelector(`.section_video .video_btn.on`).classList.remove('on');
            document.querySelector(`.section_video  .${item.classList[0]}.video_btn`).classList.add('on');
        })
    }

    window.addEventListener('resize',function (){
        if (window.innerWidth < 767){
            var ship = new Swiper(".shipSwiper", {
                slidesPerView: 1,
                speed: 1000,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        }
    })

}
// window.addEventListener('scroll', function () {
//     window.pageYOffset > 10 ? document.querySelector('.header').classList.add('scroll') : document.querySelector('.header').classList.remove('scroll');
// });

function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
        total: t,
        days: days,
        hours: hours,
        minutes: minutes,
        seconds: seconds
    };
}

function initializeClock(id, endtime) {
    var clock = document.getElementById(id);
    var daysSpan = clock.querySelector(".days");
    var hoursSpan = clock.querySelector(".hours");
    var minutesSpan = clock.querySelector(".minutes");

    function updateClock() {
        var t = getTimeRemaining(endtime);

        if (t.total <= 0) {
            clearInterval(timeinterval);
            var deadline = new Date(Date.parse(new Date()) + 6 * 1000);
            initializeClock('countdown', deadline);
        }

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ("0" + t.hours).slice(-2);
        minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
    }

    updateClock();
    var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(Date.parse(new Date()) + 150000 * 1000);
initializeClock("countdown", deadline);
