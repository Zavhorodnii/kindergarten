function MenuScrollAnchors(anchor, menu_link) {

    const menuLink = document.querySelectorAll(menu_link)
    for (let anchor of menuLink) {
        anchor.addEventListener('click', function (e) {
            e.preventDefault()
            const blockID = anchor.getAttribute('href')
            document.querySelector(blockID).scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            })
        })
    }

    let dateTopAnchors = [];
    for (let item of document.querySelectorAll(anchor)) {
        dateTopAnchors.push(item.getBoundingClientRect().top + pageYOffset + window.innerHeight / 3 * 2 - 60) // компенсипующий падинг
    }
    window.scrollBy(0, 1);
    let currentActive = -1;

    window.addEventListener('scroll', function () {
        for (let i = 0; i < dateTopAnchors.length; i++) {

            if (window.pageYOffset <= dateTopAnchors[i]) {
                if (currentActive !== i) {
                    if (document.querySelector(menu_link + '.active')) {
                        document.querySelector(menu_link + '.active').classList.remove('active');
                    }
                    currentActive = i;
                    menuLink[currentActive].classList.add('active');
                }
                break;
            }

        }
    });
}
