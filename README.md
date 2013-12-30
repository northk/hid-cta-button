hid-cta-button
==============

**hid-cta-button** is a WordPress plugin which displays a simple, configurable call-to-action button in a page or post. There are some really nice plugins available at WordPress.org to do this, but I wanted a very simple one with no admin panel, only one pre-defined CSS class, and no additional configuration. 

To use it, copy the 'hid-cta-button' folder into wp-content/plugins. Then activate the plug-in in the WordPress control panel.

Use it by inserting a shortcode into a page or post like this:

`[hid-cta-button text="Contact Me" url="http://www.example.com/contact-me"]`

Which will give you code like this:

`<a href='http://www.example.com/contact-me' class='hid-cta-button'>Contact Me</a>`

The default CSS class applied to the button will be `.hid-cta-button`. You can optionally use a different class to apply to the button like this:

`[hid-cta-button text="Contact Me" url="http://www.example.com/contact-me" class="mybutton"]`

To get you started, here is the CSS I used to style buttons on my site. The plugin has no css file included, so by default you will get no styling. The css for your site will need to be modified to suit your design, of course!

```CSS
a.hid-cta-button {
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition:    all 0.1s ease-in-out;
    -ms-transition:     all 0.1s ease-in-out;
    -o-transition:      all 0.1s ease-in-out;
    transition:         all 0.1s ease-in-out;
    background-color: #333;
    color: #fff;
    cursor: pointer;
    padding: 16px 24px;
    padding: 1.6rem 2.4rem;
    margin-bottom: 16px;
    margin-bottom: 1.6rem;
    text-transform: uppercase;
    width: auto;
    border: none;
    border-radius: 3px;
    display: inline-block;
}

a.hid-cta-button:hover {
    color: #fff;
    background-color: #086CA2;
    border: none;
}
```

Brought to you by North Krimsly at [www.highintegritydesign.com](http://www.highintegritydesign.com) Enjoy!
