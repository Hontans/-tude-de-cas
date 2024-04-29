class Carousel {
    constructor(element, options = {}) {
        this.element= element
        this.options = Object.assign({}, {
            slidesToScroll: 1,
            slidesVisible: 1,
        }, options)
        let children = [].slice.call (element.children)
        let root = this.createDivWithclass('carousel')
        this.container = this.createDivWithclass('carousel__container')
        root.appendChild(this.container)
        this.element.appendChild(root)
        this.items = children.map((child) => {
            let item = this.createDivWithclass('carousel__item')
            item.appendChild(child)
            this.container.appendChild(item)
            return item
        })
        this.setStyle()
        this.createNavigation()
    }

    setStyle () {
        let ratio = this.items.length / this.options.slidesVisible
        this.container.style.width = (ratio * 100) + '%'
        this.items.forEach(item => item.style.width = ((100 / this.options.slidesVisible) / ratio) + "%")
    }

    createNavigation () {

    }

    createDivWithclass(className) {
        let div = document.createElement('div')
        div.setAttribute('class', className)
        return div
    }
}

document.addEventListener('DOMContentLoaded', function() {
    new Carousel(document.querySelector('#carousel'), {
        slidesToScroll: 1,
        slidesVisible: 1,
    })
})