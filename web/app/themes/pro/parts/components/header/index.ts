import { ScreenLock } from '../../../js/app/__constants/lock-screen';

class Header {
    header: HTMLElement | null;
    btnMenu: HTMLElement | null;
    viewport: MediaQueryList;

    constructor() {
        this.header = document.querySelector('.main-header');
        this.btnMenu =
            this.header && this.header.querySelector('.main-header__button');
        this.viewport = window.matchMedia('screen and (max-width: 1199px)');
    }

    init() {
        if (!this.header) {
            return;
        }
        if (this.btnMenu) {
            this.btnMenu.addEventListener('click', () => this.toggleMenu());
        }
        window.addEventListener('resize', () => this.resized());
        window.addEventListener('keydown', (e) => this.keyDown(e));
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
}

export const header = new Header();

header.init();
