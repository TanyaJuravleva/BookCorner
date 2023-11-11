
window.addEventListener('DOMContentLoaded', () => {
    const section = document.getElementsByClassName('author-products-toggle')[0]
    const buttons = section.getElementsByTagName('button')
    buttons[0].classList.add('author-products-toggle__button_gray')
    for (let i = 1; i < buttons.length; i++) {
        buttons[i].classList.add('author-products-toggle__button_light')
    }

    function handler()
    {
        console.log(0)
       // buttons[index].classList.add('author-products-toggle__button_gray')
        // for (let i = 0; i < buttons.length; i++) {
        //     if (i != index)
        //     {
        //         buttons[i].classList.add('author-products-toggle__button_light')
        //     }
        // }
    }

    for (let i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function() {
            buttons[i].classList.add('author-products-toggle__button_gray')
                for (let l = 0; l < buttons.length; l++) {
                    if (l != i)
                    {
                        buttons[l].classList.remove('author-products-toggle__button_gray')
                        buttons[l].classList.add('author-products-toggle__button_light')
                    }
                }
        })
    }
})