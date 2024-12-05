import { ScreenLock } from '../../../js/app/__constants/lock-screen';
import throttle from 'lodash/throttle';

class Header {
    header: HTMLElement | null;
    btnMenu: HTMLElement | null;
    viewport: MediaQueryList;
    hashLinks: NodeListOf<HTMLAnchorElement> | null;

    constructor() {
        this.header = document.querySelector('.main-header');
        this.btnMenu =
            this.header && this.header.querySelector('.main-header__button');
        this.viewport = window.matchMedia('screen and (max-width: 1199px)');
        this.hashLinks =
            this.header &&
            this.header.querySelectorAll('a[href^="#"]:not([href="#"])');
    }

    init() {
        if (!this.header) {
            return;
        }
        if (this.btnMenu) {
            this.btnMenu.addEventListener('click', () => this.toggleMenu());
        }
        if (this.hashLinks) {
            this.handleHashLinks();
        }
        window.addEventListener('resize', () => this.resized());
        window.addEventListener('keydown', (e) => this.keyDown(e));

        this.scrolled();
    }

    scrollToSection(e: Event) {
        e.preventDefault();
        const targetElement = e.target as HTMLAnchorElement;
        const href = targetElement?.getAttribute('href');
        if (!href) {
            return;
        }
        const target = document.querySelector(href);
        const stickyHeight = this.header?.offsetHeight
            ? this.header?.offsetHeight
            : 0;
        if (target) {
            window.scrollTo({
                top: (target as HTMLElement).offsetTop - stickyHeight,
                behavior: 'smooth',
            });
        }
    }

    handleHashLinks() {
        if (this.hashLinks) {
            this.hashLinks.forEach((link) => {
                link.addEventListener('click', (e) => {
                    this.closeMenu();
                    this.scrollToSection(e);
                });
            });
        }
    }

    toggleMenu() {
        if (this.header && this.header.classList.contains('open')) {
            this.closeMenu();
        } else {
            this.openMenu();
        }
    }

    openMenu() {
        this.header && this.header.classList.add('open');
        ScreenLock.lock();
    }

    closeMenu() {
        if (this.header && this.header.classList.contains('open')) {
            this.header.classList.remove('open');
            ScreenLock.unlock();
        }
    }

    keyDown(e: KeyboardEvent) {
        if (
            e.code === 'Escape' &&
            this.header &&
            this.header.classList.contains('open')
        ) {
            this.closeMenu();
        }
    }

    resized() {
        if (this.header && !this.viewport.matches) {
            this.closeMenu();
        }
    }

    scrolled() {
        // const topClass = 'top';
        const scrolledClass = 'scrolled';

        // let lastScrollY = window.scrollY;

        if (window.scrollY > 0) {
            this.header?.classList.add(scrolledClass);
        }

        window.addEventListener(
            'scroll',
            throttle(() => {
                const currentScrollY = window.scrollY;

                if (currentScrollY > 0) {
                    // this.header?.classList.remove(topClass);
                    this.header?.classList.add(scrolledClass);
                } else {
                    this.header?.classList.remove(scrolledClass);
                }

                // if (currentScrollY > lastScrollY) {
                //     this.header?.classList.remove(scrolledClass);
                //     // this.header?.classList.add(topClass);
                // } else if (currentScrollY < lastScrollY && currentScrollY > 0) {
                //     this.header?.classList.add(scrolledClass);
                //     // this.header?.classList.remove(topClass);
                // }

                // lastScrollY = currentScrollY;
            }, 100)
        );
    }
}

export const header = new Header();

header.init();
