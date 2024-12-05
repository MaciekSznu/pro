/* eslint-disable no-restricted-syntax */
/* eslint-disable sonarjs/no-duplicate-string */

const jQ = jQuery.noConflict();

declare const ajax_nonce: string;
declare const WP: { ajaxUrl: string };

class Filters {
    // pageContent: HTMLElement | null;
    resultsGrid: HTMLElement | null;
    filterItems: NodeListOf<HTMLSelectElement> | null;
    filtersButton: HTMLButtonElement | null;
    loadMoreButton: HTMLButtonElement | null;
    results: HTMLElement | null;
    ppp: string | null;
    postType: string | null;
    baseURL: string | null;
    taxonomies: Record<string, string>;
    allowAjax: boolean;

    constructor() {
        // this.pageContent = document.querySelector('.page-content');
        this.resultsGrid = document.querySelector('.archive-grid');
        this.filterItems = document.querySelectorAll(
            '.archive-filter__filter-item'
        );
        this.filtersButton = document.querySelector(
            '.archive-search__button-wrapper button'
        );
        this.loadMoreButton = document.querySelector('.load-more-button');
        this.results = document.querySelector('.archive-results');
        this.ppp =
            this.resultsGrid && this.resultsGrid.getAttribute('data-ppp');
        this.postType =
            this.resultsGrid && this.resultsGrid.getAttribute('data-post-type');
        this.baseURL =
            this.resultsGrid && this.resultsGrid.getAttribute('data-url');
        this.taxonomies = {};
        this.allowAjax = true;
    }

    init() {
        if (!this.resultsGrid) {
            return;
        }

        this.urlFunction();

        this.handleFilterButtons()

        this.filtersButton &&
            this.filtersButton.addEventListener('click', (e) => {
                e.preventDefault();
                this.setAjaxData();
                this.applyFilters();
            });

        this.loadMoreButton?.addEventListener('click', (e) => {
            e.preventDefault();
            this.loadMoreTrigger();
        });
    }

    handleFilterButtons() {
        if (!this.filterItems) {
            return;
        }

        this.filterItems.forEach((filter) => {
            const buttons = filter.querySelectorAll('button');

            buttons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    console.log(button, index);
                    if (button.classList.contains('selected')) {
                        button.classList.remove('selected');
                        filter.dataset.term = '';
                    } else {
                        buttons.forEach((item, itemIndex) => {
                            if (index === itemIndex) {
                                item.classList.add('selected');
                                filter.dataset.term = item.dataset.term;
                            } else {
                                item.classList.remove('selected');
                            }
                        });
                    }
                });
            });
        });
    }
    setAjaxData() {
        if (!this.filterItems) {
            return;
        }

        this.filterItems.forEach((item) => {
            const tax = item.getAttribute('data-tax');
            const term = item.getAttribute('data-term');
            if (term === '0' || term === '') {
                tax && delete this.taxonomies[tax];
            } else {
                if (tax !== null && term !== null) {
                    this.taxonomies[tax] = term;
                }
            }
        });
    }

    urlFunction() {
        const url = window.location.search;
        if (url) {
            window.addEventListener('popstate', () => {
                location.reload();
            });
        }

        const urlParams = new URLSearchParams(url);

        // urlParams.forEach((value, key) => {
        //     this.taxonomies[key] = value;
        // });
    }

    loadMoreTrigger() {
        if (!this.loadMoreButton) {
            return;
        }

        const nextPage =
            parseInt(this.loadMoreButton.getAttribute('data-current') || '') +
            1;
        this.loadMoreButton.setAttribute('data-current', `${nextPage}`);
        this.setAjaxData();
        this.applyFilters(nextPage, true);
    }

    setLoadMoreTriggerVisibility(response: any) {
        if (!this.loadMoreButton) {
            return;
        }

        const currentPage = response.page;
        const maxPages = response.max_num_pages;

        this.loadMoreButton.setAttribute('data-max', maxPages);
        this.loadMoreButton.setAttribute('data-current', currentPage);

        if (currentPage >= maxPages) {
            this.loadMoreButton.parentElement?.classList.add('hide');
        } else {
            this.loadMoreButton.parentElement?.classList.remove('hide');
            this.loadMoreButton.parentElement?.setAttribute(
                'data-max',
                maxPages
            );
        }
    }

    applyFilters(page = 1, loadMore = false) {
        if (this.allowAjax) {
            this.allowAjax = false;
        }

        jQ.ajax({
            url: WP.ajaxUrl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'pro_filters',
                taxonomies: JSON.stringify(this.taxonomies),
                postType: this.postType,
                ppp: this.ppp,
                base_url: this.baseURL,
                page,
                security: ajax_nonce,
            },

            beforeSend: () => {
                this.results?.classList.add('results-loading');
            },

            error: (response) => {
                // eslint-disable-next-line no-console
                console.log(response.responseText);
                this.results?.classList.remove('results-loading');
                this.allowAjax = true;
            },

            success: (response) => {
                // eslint-disable-next-line no-restricted-globals
                // history.pushState(null, '', response.url);
                this.allowAjax = true;
                this.setLoadMoreTriggerVisibility(response);
                if (this.results && !loadMore) {
                    this.results.innerHTML = response.posts_content;
                    this.results?.classList.remove('results-loading');
                } else {
                    this.results?.insertAdjacentHTML(
                        'beforeend',
                        response.posts_content
                    );
                    this.results?.classList.remove('results-loading');
                }
            },
        });
    }
}

const filters = new Filters();

filters.init();
