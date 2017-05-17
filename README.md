# Wordpress Bootstrap4 nav
Custom Bootstrap 4.0.0-alpha6 nav menu walker for Wordpress.

## Getting started
1. Add ```include "custom-nav-walker.php";``` to *functions.php*
1. Make sure to include ```'walker' => new Main_Nav_Walker()``` in the wp_nav_menu attributes array.

## Example usage
```
<nav class="navbar sticky-top navbar-toggleable-sm navbar-inverse bg-inverse">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse justify-content-sm-center" id="navbarSupportedContent">
        <?php
            wp_nav_menu(array(
                'theme_location'=>'primary', 
                'container'=> false,
                'menu_class' => 'navbar-nav',
                'items_wrap'=> '<ul class="%2$s">%3$s</ul>',
                'walker' => new Main_Nav_Walker(), 
                'fallback_cb'=>false
            ));
        ?>
    </div>
</nav>
```

## Licence
This is my own code and not my employer's IP.

Free to use and modified, no string attached but crediting Tina Boyce would be nice if it was helpful. A quick thanks on @elegantpoem twitter is fine too, just wanted to know whether it helps someone.

I have created this code to help my family member on a Wordpress website after my main job.
