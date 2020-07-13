<form method="get" id="searchform"

action="<?php bloginfo('url'); ?>/">

<br>

 <div align="center">
   <input type="text" class="search" value="<?php the_search_query(); ?>" placeholder="Type and press enter"

onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type and press enter'" /

name="s" id="s" />

 </div>

</form>
