<style>
    a {
        underline: none !important;
    }

    /* Header layout */
    .header-content {
        height: 96px;
        padding: 12px 0;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header-content.hidden {
        display: none !important;
    }

    .header-content.shrink {
        height: 64px;
        padding: 6px 0;
    }

    /* Logo */
    .header-logo {
        max-height: 64px;
        transition: max-height 0.3s ease;
    }

    .header-content.shrink .header-logo {
        max-height: 42px;
    }

    /* Nav text */
    .button-navigation a,
    .button-navigation button {
        font-size: 14px;
        margin-top: 6px;
        line-height: 1.2;
        text-decoration-line: underline;
        text-decoration-thickness: 2px;
        text-underline-offset: 6px;
    }

    .header-content.shrink .header-nav {
        margin-top: 0;
    }

    .nav-text {
        font-size: 14px;
        margin-top: 8px;
    }

    .navigation-logo {
        margin-bottom: -4px;
    }
</style>
