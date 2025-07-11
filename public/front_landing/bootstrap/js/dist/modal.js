/*!
  * Bootstrap modal.js v5.1.3 (https://getbootstrap.com/)
  * Copyright 2011-2021 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */
(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined'
        ? module.exports = factory(require('./dom/event-handler.js'),
            require('./dom/manipulator.js'), require('./dom/selector-engine.js'),
            require('./base-component.js'))
        :
        typeof define === 'function' && define.amd ? define([
                './dom/event-handler',
                './dom/manipulator',
                './dom/selector-engine',
                './base-component'], factory) :
            (global = typeof globalThis !== 'undefined' ? globalThis : global ||
                self, global.Modal = factory(global.EventHandler,
                global.Manipulator, global.SelectorEngine, global.Base))
})(this, (function (EventHandler, Manipulator, SelectorEngine, BaseComponent) {
    'use strict'

    const _interopDefaultLegacy = e => e && typeof e === 'object' &&
    'default' in e ? e : { default: e }

    const EventHandler__default = /*#__PURE__*/_interopDefaultLegacy(
        EventHandler)
    const Manipulator__default = /*#__PURE__*/_interopDefaultLegacy(
        Manipulator)
    const SelectorEngine__default = /*#__PURE__*/_interopDefaultLegacy(
        SelectorEngine)
    const BaseComponent__default = /*#__PURE__*/_interopDefaultLegacy(
        BaseComponent)

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v5.1.3): util/index.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
     * --------------------------------------------------------------------------
     */
    const MILLISECONDS_MULTIPLIER = 1000
    const TRANSITION_END = 'transitionend' // Shoutout AngusCroll (https://goo.gl/pxwQGp)

    const toType = obj => {
        if (obj === null || obj === undefined) {
            return `${obj}`
        }

        return {}.toString.call(obj).match(/\s([a-z]+)/i)[1].toLowerCase()
    }

    const getSelector = element => {
        let selector = element.getAttribute('data-bs-target')

        if (!selector || selector === '#') {
            let hrefAttr = element.getAttribute('href') // The only valid content that could double as a selector are IDs or classes,
            // so everything starting with `#` or `.`. If a "real" URL is used as the selector,
            // `document.querySelector` will rightfully complain it is invalid.
            // See https://github.com/twbs/bootstrap/issues/32273

            if (!hrefAttr || !hrefAttr.includes('#') &&
                !hrefAttr.startsWith('.')) {
                return null
            } // Just in case some CMS puts out a full URL with the anchor appended

            if (hrefAttr.includes('#') && !hrefAttr.startsWith('#')) {
                hrefAttr = `#${hrefAttr.split('#')[1]}`
            }

            selector = hrefAttr && hrefAttr !== '#' ? hrefAttr.trim() : null
        }

        return selector
    }

    const getElementFromSelector = element => {
        const selector = getSelector(element)
        return selector ? document.querySelector(selector) : null
    }

    const getTransitionDurationFromElement = element => {
        if (!element) {
            return 0
        } // Get transition-duration of the element

        let {
            transitionDuration,
            transitionDelay,
        } = window.getComputedStyle(element)
        const floatTransitionDuration = Number.parseFloat(transitionDuration)
        const floatTransitionDelay = Number.parseFloat(transitionDelay) // Return 0 if element or transition duration is not found

        if (!floatTransitionDuration && !floatTransitionDelay) {
            return 0
        } // If multiple durations are defined, take the first

        transitionDuration = transitionDuration.split(',')[0]
        transitionDelay = transitionDelay.split(',')[0]
        return (Number.parseFloat(transitionDuration) +
            Number.parseFloat(transitionDelay)) * MILLISECONDS_MULTIPLIER
    }

    const triggerTransitionEnd = element => {
        element.dispatchEvent(new Event(TRANSITION_END))
    }

    const isElement = obj => {
        if (!obj || typeof obj !== 'object') {
            return false
        }

        if (typeof obj.jquery !== 'undefined') {
            obj = obj[0]
        }

        return typeof obj.nodeType !== 'undefined'
    }

    const getElement = obj => {
        if (isElement(obj)) {
            // it's a jQuery object or a node element
            return obj.jquery ? obj[0] : obj
        }

        if (typeof obj === 'string' && obj.length > 0) {
            return document.querySelector(obj)
        }

        return null
    }

    const typeCheckConfig = (componentName, config, configTypes) => {
        Object.keys(configTypes).forEach(property => {
            const expectedTypes = configTypes[property]
            const value = config[property]
            const valueType = value && isElement(value) ? 'element' : toType(
                value)

            if (!new RegExp(expectedTypes).test(valueType)) {
                throw new TypeError(
                    `${componentName.toUpperCase()}: Option "${property}" provided type "${valueType}" but expected type "${expectedTypes}".`)
            }
        })
    }

    const isVisible = element => {
        if (!isElement(element) || element.getClientRects().length === 0) {
            return false
        }

        return getComputedStyle(element).getPropertyValue('visibility') ===
            'visible'
    }

    const isDisabled = element => {
        if (!element || element.nodeType !== Node.ELEMENT_NODE) {
            return true
        }

        if (element.classList.contains('disabled')) {
            return true
        }

        if (typeof element.disabled !== 'undefined') {
            return element.disabled
        }

        return element.hasAttribute('disabled') &&
            element.getAttribute('disabled') !== 'false'
    }
    /**
     * Trick to restart an element's animation
     *
     * @param {HTMLElement} element
     * @return void
     *
     * @see https://www.charistheo.io/blog/2021/02/restart-a-css-animation-with-javascript/#restarting-a-css-animation
     */


    const reflow = element => {
        // eslint-disable-next-line no-unused-expressions
        element.offsetHeight
    }

    const getjQuery = () => {
        const {
            jQuery,
        } = window

        if (jQuery && !document.body.hasAttribute('data-bs-no-jquery')) {
            return jQuery
        }

        return null
    }

    const DOMContentLoadedCallbacks = []

    const onDOMContentLoaded = callback => {
        if (document.readyState === 'loading') {
            // add listener on the first call when the document is in loading state
            if (!DOMContentLoadedCallbacks.length) {
                document.addEventListener('DOMContentLoaded', () => {
                    DOMContentLoadedCallbacks.forEach(callback => callback())
                })
            }

            DOMContentLoadedCallbacks.push(callback)
        } else {
            callback()
        }
    }

    const isRTL = () => document.documentElement.dir === 'rtl'

    const defineJQueryPlugin = plugin => {
        onDOMContentLoaded(() => {
            const $ = getjQuery()
            /* istanbul ignore if */

            if ($) {
                const name = plugin.NAME
                const JQUERY_NO_CONFLICT = $.fn[name]
                $.fn[name] = plugin.jQueryInterface
                $.fn[name].Constructor = plugin

                $.fn[name].noConflict = () => {
                    $.fn[name] = JQUERY_NO_CONFLICT
                    return plugin.jQueryInterface
                }
            }
        })
    }

    const execute = callback => {
        if (typeof callback === 'function') {
            callback()
        }
    }

    const executeAfterTransition = (
        callback, transitionElement, waitForTransition = true) => {
        if (!waitForTransition) {
            execute(callback)
            return
        }

        const durationPadding = 5
        const emulatedDuration = getTransitionDurationFromElement(
            transitionElement) + durationPadding
        let called = false

        const handler = ({
                             target,
                         }) => {
            if (target !== transitionElement) {
                return
            }

            called = true
            transitionElement.removeEventListener(TRANSITION_END, handler)
            execute(callback)
        }

        transitionElement.addEventListener(TRANSITION_END, handler)
        setTimeout(() => {
            if (!called) {
                triggerTransitionEnd(transitionElement)
            }
        }, emulatedDuration)
    }

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v5.1.3): util/scrollBar.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
     * --------------------------------------------------------------------------
     */
    const SELECTOR_FIXED_CONTENT = '.fixed-top, .fixed-bottom, .is-fixed, .sticky-top'
    const SELECTOR_STICKY_CONTENT = '.sticky-top'

    class ScrollBarHelper {
        constructor () {
            this._element = document.body
        }

        getWidth () {
            // https://developer.mozilla.org/en-US/docs/Web/API/Window/innerWidth#usage_notes
            const documentWidth = document.documentElement.clientWidth
            return Math.abs(window.innerWidth - documentWidth)
        }

        hide () {
            const width = this.getWidth()

            this._disableOverFlow() // give padding to element to balance the hidden scrollbar width

            this._setElementAttributes(this._element, 'paddingRight',
                calculatedValue => calculatedValue + width) // trick: We adjust positive paddingRight and negative marginRight to sticky-top elements to keep showing fullwidth

            this._setElementAttributes(SELECTOR_FIXED_CONTENT, 'paddingRight',
                calculatedValue => calculatedValue + width)

            this._setElementAttributes(SELECTOR_STICKY_CONTENT, 'marginRight',
                calculatedValue => calculatedValue - width)
        }

        _disableOverFlow () {
            this._saveInitialAttribute(this._element, 'overflow')

            this._element.style.overflow = 'hidden'
        }

        _setElementAttributes (selector, styleProp, callback) {
            const scrollbarWidth = this.getWidth()

            const manipulationCallBack = element => {
                if (element !== this._element && window.innerWidth >
                    element.clientWidth + scrollbarWidth) {
                    return
                }

                this._saveInitialAttribute(element, styleProp)

                const calculatedValue = window.getComputedStyle(
                    element)[styleProp]
                element.style[styleProp] = `${callback(
                    Number.parseFloat(calculatedValue))}px`
            }

            this._applyManipulationCallback(selector, manipulationCallBack)
        }

        reset () {
            this._resetElementAttributes(this._element, 'overflow')

            this._resetElementAttributes(this._element, 'paddingRight')

            this._resetElementAttributes(SELECTOR_FIXED_CONTENT,
                'paddingRight')

            this._resetElementAttributes(SELECTOR_STICKY_CONTENT,
                'marginRight')
        }

        _saveInitialAttribute (element, styleProp) {
            const actualValue = element.style[styleProp]

            if (actualValue) {
                Manipulator__default.default.setDataAttribute(element,
                    styleProp, actualValue)
            }
        }

        _resetElementAttributes (selector, styleProp) {
            const manipulationCallBack = element => {
                const value = Manipulator__default.default.getDataAttribute(
                    element, styleProp)

                if (typeof value === 'undefined') {
                    element.style.removeProperty(styleProp)
                } else {
                    Manipulator__default.default.removeDataAttribute(element,
                        styleProp)
                    element.style[styleProp] = value
                }
            }

            this._applyManipulationCallback(selector, manipulationCallBack)
        }

        _applyManipulationCallback (selector, callBack) {
            if (isElement(selector)) {
                callBack(selector)
            } else {
                SelectorEngine__default.default.find(selector, this._element).
                    forEach(callBack)
            }
        }

        isOverflowing () {
            return this.getWidth() > 0
        }

    }

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v5.1.3): util/backdrop.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
     * --------------------------------------------------------------------------
     */
    const Default$2 = {
        className: 'modal-backdrop',
        isVisible: true,
        // if false, we use the backdrop helper without adding any element to the dom
        isAnimated: false,
        rootElement: 'body',
        // give the choice to place backdrop under different elements
        clickCallback: null,
    }
    const DefaultType$2 = {
        className: 'string',
        isVisible: 'boolean',
        isAnimated: 'boolean',
        rootElement: '(element|string)',
        clickCallback: '(function|null)',
    }
    const NAME$2 = 'backdrop'
    const CLASS_NAME_FADE$1 = 'fade'
    const CLASS_NAME_SHOW$1 = 'show'
    const EVENT_MOUSEDOWN = `mousedown.bs.${NAME$2}`

    class Backdrop {
        constructor (config) {
            this._config = this._getConfig(config)
            this._isAppended = false
            this._element = null
        }

        show (callback) {
            if (!this._config.isVisible) {
                execute(callback)
                return
            }

            this._append()

            if (this._config.isAnimated) {
                reflow(this._getElement())
            }

            this._getElement().classList.add(CLASS_NAME_SHOW$1)

            this._emulateAnimation(() => {
                execute(callback)
            })
        }

        hide (callback) {
            if (!this._config.isVisible) {
                execute(callback)
                return
            }

            this._getElement().classList.remove(CLASS_NAME_SHOW$1)

            this._emulateAnimation(() => {
                this.dispose()
                execute(callback)
            })
        } // Private

        _getElement () {
            if (!this._element) {
                const backdrop = document.createElement('div')
                backdrop.className = this._config.className

                if (this._config.isAnimated) {
                    backdrop.classList.add(CLASS_NAME_FADE$1)
                }

                this._element = backdrop
            }

            return this._element
        }

        _getConfig (config) {
            config = {
                ...Default$2,
                ...(typeof config === 'object' ? config : {}),
            } // use getElement() with the default "body" to get a fresh Element on each instantiation

            config.rootElement = getElement(config.rootElement)
            typeCheckConfig(NAME$2, config, DefaultType$2)
            return config
        }

        _append () {
            if (this._isAppended) {
                return
            }

            this._config.rootElement.append(this._getElement())

            EventHandler__default.default.on(this._getElement(),
                EVENT_MOUSEDOWN, () => {
                    execute(this._config.clickCallback)
                })
            this._isAppended = true
        }

        dispose () {
            if (!this._isAppended) {
                return
            }

            EventHandler__default.default.off(this._element, EVENT_MOUSEDOWN)

            this._element.remove()

            this._isAppended = false
        }

        _emulateAnimation (callback) {
            executeAfterTransition(callback, this._getElement(),
                this._config.isAnimated)
        }

    }

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v5.1.3): util/focustrap.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
     * --------------------------------------------------------------------------
     */
    const Default$1 = {
        trapElement: null,
        // The element to trap focus inside of
        autofocus: true,
    }
    const DefaultType$1 = {
        trapElement: 'element',
        autofocus: 'boolean',
    }
    const NAME$1 = 'focustrap'
    const DATA_KEY$1 = 'bs.focustrap'
    const EVENT_KEY$1 = `.${DATA_KEY$1}`
    const EVENT_FOCUSIN = `focusin${EVENT_KEY$1}`
    const EVENT_KEYDOWN_TAB = `keydown.tab${EVENT_KEY$1}`
    const TAB_KEY = 'Tab'
    const TAB_NAV_FORWARD = 'forward'
    const TAB_NAV_BACKWARD = 'backward'

    class FocusTrap {
        constructor (config) {
            this._config = this._getConfig(config)
            this._isActive = false
            this._lastTabNavDirection = null
        }

        activate () {
            const {
                trapElement,
                autofocus,
            } = this._config

            if (this._isActive) {
                return
            }

            if (autofocus) {
                trapElement.focus()
            }

            EventHandler__default.default.off(document, EVENT_KEY$1) // guard against infinite focus loop

            EventHandler__default.default.on(document, EVENT_FOCUSIN,
                event => this._handleFocusin(event))
            EventHandler__default.default.on(document, EVENT_KEYDOWN_TAB,
                event => this._handleKeydown(event))
            this._isActive = true
        }

        deactivate () {
            if (!this._isActive) {
                return
            }

            this._isActive = false
            EventHandler__default.default.off(document, EVENT_KEY$1)
        } // Private

        _handleFocusin (event) {
            const {
                target,
            } = event
            const {
                trapElement,
            } = this._config

            if (target === document || target === trapElement ||
                trapElement.contains(target)) {
                return
            }

            const elements = SelectorEngine__default.default.focusableChildren(
                trapElement)

            if (elements.length === 0) {
                trapElement.focus()
            } else if (this._lastTabNavDirection === TAB_NAV_BACKWARD) {
                elements[elements.length - 1].focus()
            } else {
                elements[0].focus()
            }
        }

        _handleKeydown (event) {
            if (event.key !== TAB_KEY) {
                return
            }

            this._lastTabNavDirection = event.shiftKey
                ? TAB_NAV_BACKWARD
                : TAB_NAV_FORWARD
        }

        _getConfig (config) {
            config = {
                ...Default$1,
                ...(typeof config === 'object' ? config : {}),
            }
            typeCheckConfig(NAME$1, config, DefaultType$1)
            return config
        }

    }

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v5.1.3): util/component-functions.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
     * --------------------------------------------------------------------------
     */

    const enableDismissTrigger = (component, method = 'hide') => {
        const clickEvent = `click.dismiss${component.EVENT_KEY}`
        const name = component.NAME
        EventHandler__default.default.on(document, clickEvent,
            `[data-bs-dismiss="${name}"]`, function (event) {
                if (['A', 'AREA'].includes(this.tagName)) {
                    event.preventDefault()
                }

                if (isDisabled(this)) {
                    return
                }

                const target = getElementFromSelector(this) ||
                    this.closest(`.${name}`)
                const instance = component.getOrCreateInstance(target) // Method argument is left, for Alert and only, as it doesn't implement the 'hide' method

                instance[method]()
            })
    }

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v5.1.3): modal.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
     * --------------------------------------------------------------------------
     */
    /**
     * ------------------------------------------------------------------------
     * Constants
     * ------------------------------------------------------------------------
     */

    const NAME = 'modal'
    const DATA_KEY = 'bs.modal'
    const EVENT_KEY = `.${DATA_KEY}`
    const DATA_API_KEY = '.data-api'
    const ESCAPE_KEY = 'Escape'
    const Default = {
        backdrop: true,
        keyboard: true,
        focus: true,
    }
    const DefaultType = {
        backdrop: '(boolean|string)',
        keyboard: 'boolean',
        focus: 'boolean',
    }
    const EVENT_HIDE = `hide${EVENT_KEY}`
    const EVENT_HIDE_PREVENTED = `hidePrevented${EVENT_KEY}`
    const EVENT_HIDDEN = `hidden${EVENT_KEY}`
    const EVENT_SHOW = `show${EVENT_KEY}`
    const EVENT_SHOWN = `shown${EVENT_KEY}`
    const EVENT_RESIZE = `resize${EVENT_KEY}`
    const EVENT_CLICK_DISMISS = `click.dismiss${EVENT_KEY}`
    const EVENT_KEYDOWN_DISMISS = `keydown.dismiss${EVENT_KEY}`
    const EVENT_MOUSEUP_DISMISS = `mouseup.dismiss${EVENT_KEY}`
    const EVENT_MOUSEDOWN_DISMISS = `mousedown.dismiss${EVENT_KEY}`
    const EVENT_CLICK_DATA_API = `click${EVENT_KEY}${DATA_API_KEY}`
    const CLASS_NAME_OPEN = 'modal-open'
    const CLASS_NAME_FADE = 'fade'
    const CLASS_NAME_SHOW = 'show'
    const CLASS_NAME_STATIC = 'modal-static'
    const OPEN_SELECTOR = '.modal.show'
    const SELECTOR_DIALOG = '.modal-dialog'
    const SELECTOR_MODAL_BODY = '.modal-body'
    const SELECTOR_DATA_TOGGLE = '[data-bs-toggle="modal"]'

    /**
     * ------------------------------------------------------------------------
     * Class Definition
     * ------------------------------------------------------------------------
     */

    class Modal extends BaseComponent__default.default {
        constructor (element, config) {
            super(element)
            this._config = this._getConfig(config)
            this._dialog = SelectorEngine__default.default.findOne(
                SELECTOR_DIALOG, this._element)
            this._backdrop = this._initializeBackDrop()
            this._focustrap = this._initializeFocusTrap()
            this._isShown = false
            this._ignoreBackdropClick = false
            this._isTransitioning = false
            this._scrollBar = new ScrollBarHelper()
        } // Getters

        static get Default () {
            return Default
        }

        static get NAME () {
            return NAME
        } // Public

        toggle (relatedTarget) {
            return this._isShown ? this.hide() : this.show(relatedTarget)
        }

        show (relatedTarget) {
            if (this._isShown || this._isTransitioning) {
                return
            }

            const showEvent = EventHandler__default.default.trigger(
                this._element, EVENT_SHOW, {
                    relatedTarget,
                })

            if (showEvent.defaultPrevented) {
                return
            }

            this._isShown = true

            if (this._isAnimated()) {
                this._isTransitioning = true
            }

            this._scrollBar.hide()

            document.body.classList.add(CLASS_NAME_OPEN)

            this._adjustDialog()

            this._setEscapeEvent()

            this._setResizeEvent()

            EventHandler__default.default.on(this._dialog,
                EVENT_MOUSEDOWN_DISMISS, () => {
                    EventHandler__default.default.one(this._element,
                        EVENT_MOUSEUP_DISMISS, event => {
                            if (event.target === this._element) {
                                this._ignoreBackdropClick = true
                            }
                        })
                })

            this._showBackdrop(() => this._showElement(relatedTarget))
        }

        hide () {
            if (!this._isShown || this._isTransitioning) {
                return
            }

            const hideEvent = EventHandler__default.default.trigger(
                this._element, EVENT_HIDE)

            if (hideEvent.defaultPrevented) {
                return
            }

            this._isShown = false

            const isAnimated = this._isAnimated()

            if (isAnimated) {
                this._isTransitioning = true
            }

            this._setEscapeEvent()

            this._setResizeEvent()

            this._focustrap.deactivate()

            this._element.classList.remove(CLASS_NAME_SHOW)

            EventHandler__default.default.off(this._element,
                EVENT_CLICK_DISMISS)
            EventHandler__default.default.off(this._dialog,
                EVENT_MOUSEDOWN_DISMISS)

            this._queueCallback(() => this._hideModal(), this._element,
                isAnimated)
        }

        dispose () {
            [window, this._dialog].forEach(
                htmlElement => EventHandler__default.default.off(htmlElement,
                    EVENT_KEY))

            this._backdrop.dispose()

            this._focustrap.deactivate()

            super.dispose()
        }

        handleUpdate () {
            this._adjustDialog()
        } // Private

        _initializeBackDrop () {
            return new Backdrop({
                isVisible: Boolean(this._config.backdrop),
                // 'static' option will be translated to true, and booleans will keep their value
                isAnimated: this._isAnimated(),
            })
        }

        _initializeFocusTrap () {
            return new FocusTrap({
                trapElement: this._element,
            })
        }

        _getConfig (config) {
            config = {
                ...Default,
                ...Manipulator__default.default.getDataAttributes(
                    this._element),
                ...(typeof config === 'object' ? config : {}),
            }
            typeCheckConfig(NAME, config, DefaultType)
            return config
        }

        _showElement (relatedTarget) {
            const isAnimated = this._isAnimated()

            const modalBody = SelectorEngine__default.default.findOne(
                SELECTOR_MODAL_BODY, this._dialog)

            if (!this._element.parentNode ||
                this._element.parentNode.nodeType !== Node.ELEMENT_NODE) {
                // Don't move modal's DOM position
                document.body.append(this._element)
            }

            this._element.style.display = 'block'

            this._element.removeAttribute('aria-hidden')

            this._element.setAttribute('aria-modal', true)

            this._element.setAttribute('role', 'dialog')

            this._element.scrollTop = 0

            if (modalBody) {
                modalBody.scrollTop = 0
            }

            if (isAnimated) {
                reflow(this._element)
            }

            this._element.classList.add(CLASS_NAME_SHOW)

            const transitionComplete = () => {
                if (this._config.focus) {
                    this._focustrap.activate()
                }

                this._isTransitioning = false
                EventHandler__default.default.trigger(this._element,
                    EVENT_SHOWN, {
                        relatedTarget,
                    })
            }

            this._queueCallback(transitionComplete, this._dialog, isAnimated)
        }

        _setEscapeEvent () {
            if (this._isShown) {
                EventHandler__default.default.on(this._element,
                    EVENT_KEYDOWN_DISMISS, event => {
                        if (this._config.keyboard && event.key === ESCAPE_KEY) {
                            event.preventDefault()
                            this.hide()
                        } else if (!this._config.keyboard && event.key ===
                            ESCAPE_KEY) {
                            this._triggerBackdropTransition()
                        }
                    })
            } else {
                EventHandler__default.default.off(this._element,
                    EVENT_KEYDOWN_DISMISS)
            }
        }

        _setResizeEvent () {
            if (this._isShown) {
                EventHandler__default.default.on(window, EVENT_RESIZE,
                    () => this._adjustDialog())
            } else {
                EventHandler__default.default.off(window, EVENT_RESIZE)
            }
        }

        _hideModal () {
            this._element.style.display = 'none'

            this._element.setAttribute('aria-hidden', true)

            this._element.removeAttribute('aria-modal')

            this._element.removeAttribute('role')

            this._isTransitioning = false

            this._backdrop.hide(() => {
                document.body.classList.remove(CLASS_NAME_OPEN)

                this._resetAdjustments()

                this._scrollBar.reset()

                EventHandler__default.default.trigger(this._element,
                    EVENT_HIDDEN)
            })
        }

        _showBackdrop (callback) {
            EventHandler__default.default.on(this._element, EVENT_CLICK_DISMISS,
                event => {
                    if (this._ignoreBackdropClick) {
                        this._ignoreBackdropClick = false
                        return
                    }

                    if (event.target !== event.currentTarget) {
                        return
                    }

                    if (this._config.backdrop === true) {
                        this.hide()
                    } else if (this._config.backdrop === 'static') {
                        this._triggerBackdropTransition()
                    }
                })

            this._backdrop.show(callback)
        }

        _isAnimated () {
            return this._element.classList.contains(CLASS_NAME_FADE)
        }

        _triggerBackdropTransition () {
            const hideEvent = EventHandler__default.default.trigger(
                this._element, EVENT_HIDE_PREVENTED)

            if (hideEvent.defaultPrevented) {
                return
            }

            const {
                classList,
                scrollHeight,
                style,
            } = this._element
            const isModalOverflowing = scrollHeight >
                document.documentElement.clientHeight // return if the following background transition hasn't yet completed

            if (!isModalOverflowing && style.overflowY === 'hidden' ||
                classList.contains(CLASS_NAME_STATIC)) {
                return
            }

            if (!isModalOverflowing) {
                style.overflowY = 'hidden'
            }

            classList.add(CLASS_NAME_STATIC)

            this._queueCallback(() => {
                classList.remove(CLASS_NAME_STATIC)

                if (!isModalOverflowing) {
                    this._queueCallback(() => {
                        style.overflowY = ''
                    }, this._dialog)
                }
            }, this._dialog)

            this._element.focus()
        } // ----------------------------------------------------------------------
        // the following methods are used to handle overflowing modals
        // ----------------------------------------------------------------------

        _adjustDialog () {
            const isModalOverflowing = this._element.scrollHeight >
                document.documentElement.clientHeight

            const scrollbarWidth = this._scrollBar.getWidth()

            const isBodyOverflowing = scrollbarWidth > 0

            if (!isBodyOverflowing && isModalOverflowing && !isRTL() ||
                isBodyOverflowing && !isModalOverflowing && isRTL()) {
                this._element.style.paddingLeft = `${scrollbarWidth}px`
            }

            if (isBodyOverflowing && !isModalOverflowing && !isRTL() ||
                !isBodyOverflowing && isModalOverflowing && isRTL()) {
                this._element.style.paddingRight = `${scrollbarWidth}px`
            }
        }

        _resetAdjustments () {
            this._element.style.paddingLeft = ''
            this._element.style.paddingRight = ''
        } // Static

        static jQueryInterface (config, relatedTarget) {
            return this.each(function () {
                const data = Modal.getOrCreateInstance(this, config)

                if (typeof config !== 'string') {
                    return
                }

                if (typeof data[config] === 'undefined') {
                    throw new TypeError(`No method named "${config}"`)
                }

                data[config](relatedTarget)
            })
        }

    }

    /**
     * ------------------------------------------------------------------------
     * Data Api implementation
     * ------------------------------------------------------------------------
     */

    EventHandler__default.default.on(document, EVENT_CLICK_DATA_API,
        SELECTOR_DATA_TOGGLE, function (event) {
            const target = getElementFromSelector(this)

            if (['A', 'AREA'].includes(this.tagName)) {
                event.preventDefault()
            }

            EventHandler__default.default.one(target, EVENT_SHOW, showEvent => {
                if (showEvent.defaultPrevented) {
                    // only register focus restorer if modal will actually get shown
                    return
                }

                EventHandler__default.default.one(target, EVENT_HIDDEN, () => {
                    if (isVisible(this)) {
                        this.focus()
                    }
                })
            }) // avoid conflict when clicking moddal toggler while another one is open

            const allReadyOpen = SelectorEngine__default.default.findOne(
                OPEN_SELECTOR)

            if (allReadyOpen) {
                Modal.getInstance(allReadyOpen).hide()
            }

            const data = Modal.getOrCreateInstance(target)
            data.toggle(this)
        })
    enableDismissTrigger(Modal)
    /**
     * ------------------------------------------------------------------------
     * jQuery
     * ------------------------------------------------------------------------
     * add .Modal to jQuery only if jQuery is present
     */

    defineJQueryPlugin(Modal)

    return Modal

}))
//# sourceMappingURL=modal.js.map
