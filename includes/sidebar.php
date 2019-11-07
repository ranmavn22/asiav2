<?php if (is_category(89)) {
    $args = array('orderby' => 'name', 'parent' => 0,'exclude'=>array(1,89));
    $categories = get_categories($args);
    if ($categories)
        foreach ($categories as $term) {
            ?>
            <aside id="category-<?php echo $term->term_id ?>" class="widget">
                <h2 class="widget-title"><?php echo $term->name ?></h2>
                <ul class="category menu">
                    <?php
                    $args2 = array('orderby' => 'id', 'parent' => $term->term_id);
                    $childs = get_categories($args2); ?>
                    <li><a href="<?php echo get_term_link($term->term_id) ?>" title="<?php echo $term->name ?>"><?php echo $term->name ?></a>
                        <ul class="sub-menu">
                            <?php
                            if ($childs)
                                foreach ($childs as $child) {?>
                                    <?php
                                    $args3 = array('orderby' => 'id', 'parent' => $child->term_id);
                                    $childs3 = get_categories($args3); ?>
                                    <li><a href="<?php echo get_term_link($child->term_id) ?>"
                                           title="<?php echo $child->name ?>"><?php echo $child->name ?></a>
                                        <ul class="sub-menu">
                                            <?php
                                            if ($childs3)
                                                foreach ($childs3 as $child3) {
                                                    ?>
                                                    <li><a href="<?php echo get_term_link($child3->term_id) ?>"
                                                           title="<?php echo $child3->name ?>"><?php echo $child3->name ?></a>
                                                    </li>
                                                <?php } ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                        </ul>
                    </li>
                </ul>
            </aside>
        <?php }
    $args = array('orderby' => 'name', 'parent' => 0, 'taxonomy' => 'category_hotel',);
    $terms = get_terms($args);
    if ($terms)
        foreach ($terms as $term) {
            ?>
            <aside id="category-<?php echo $term->term_id ?>" class="widget inner-padding widget_nav_menu">
                <h2 class="widget-title"><?php echo $term->name ?></h2>
                <ul class="category menu">
                    <?php
                    $args = array('orderby' => 'name', 'parent' => $term->term_id, 'taxonomy' => 'category_hotel',);
                    $childs = get_terms($args);
                    ?>
                    <li><a href="<?php echo get_term_link($term->term_id) ?>" title="<?php echo $term->name ?>"><?php echo $term->name ?></a>
                        <ul class="sub-menu">
                            <?php if ($childs)
                                foreach ($childs as $child) {?>
                                    <li><a href="<?php echo get_term_link($child->term_id) ?>"
                                           title="<?php echo $child->name ?>"><?php echo $child->name ?></a>
                                    </li>
                                <?php } ?>
                        </ul>
                    </li>
                </ul>
            </aside>
        <?php }
    echo 1231234567456456;
} else { ?>
    <?php if (is_tax('category_hotel')) {
        echo 123123;
        $args = array('orderby' => 'name', 'parent' => 0, 'taxonomy' => 'category_hotel',);
        $terms = get_terms($args);
        if ($terms)
            foreach ($terms as $term) {
                ?>
                <aside id="category-<?php echo $term->term_id ?>" class="widget inner-padding widget_nav_menu">
                    <h2 class="widget-title"><?php echo $term->name ?></h2>
                    <ul class="category menu">
                        <?php
                        $args = array('orderby' => 'name', 'parent' => $term->term_id, 'taxonomy' => 'category_hotel',);
                        $childs = get_terms($args);
                        ?>
                        <li class="<?php if ($childs) echo 'menu-item-has-children' ?>"><a
                                href="<?php echo get_term_link($term->term_id) ?>"
                                title="<?php echo $term->name ?>"><?php echo $term->name ?></a>
                            <ul class="sub-menu">
                                <?php
                                if ($childs)
                                    foreach ($childs as $child) {
                                        ?>
                                        <li><a href="<?php echo get_term_link($child->term_id) ?>"
                                               title="<?php echo $child->name ?>"><?php echo $child->name ?></a>
                                        </li>
                                    <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </aside>
            <?php }
    } else if (is_category() || is_single()) {
        if(is_category()){
            $obj = get_queried_object();
        } else{
            $obj = get_the_category();
            foreach ($obj as $term){
                if($term->parent != 0){
                    $obj = $term;
                    break;
                } else
                    $obj = $obj[0];

            }
        }
        $id = $obj->term_id;
        $args2 = array('orderby' => 'id', 'parent' => $id);
        $childs = get_categories($args2);
        $parent = $obj->name;
        if(empty($childs)){
            if($obj->parent != 0){
                $id = $obj->parent;
                $args2 = array('orderby' => 'id', 'parent' => $id);
                $parent = get_the_category_by_ID($obj->parent);
                $childs = get_categories($args2);
            }
        }
        if ($obj) { ?>
            <aside id="category-<?php echo $id ?>" class="widget">
                <h2 class="widget-title"><?php echo $parent ?></h2>
                <ul class="category menu">
                    <li><a href="<?php echo get_term_link($id) ?>" title="<?php echo $parent ?>"><?php echo $parent?></a>
                        <ul class="sub-menu">
                            <?php
                            if ($childs)
                                foreach ($childs as $child) {
                                    ?>
                                    <?php
                                    $args3 = array('orderby' => 'id', 'parent' => $child->term_id);
                                    $childs3 = get_categories($args3);
                                    ?>
                                    <li><a href="<?php echo get_term_link($child->term_id) ?>"
                                           title="<?php echo $child->name ?>"><?php echo $child->name ?></a>
                                        <ul class="sub-menu">
                                            <?php
                                            if ($childs3)
                                                foreach ($childs3 as $child3) {?>
                                                    <li><a href="<?php echo get_term_link($child3->term_id) ?>" title="<?php echo $child3->name ?>"><?php echo $child3->name ?></a>
                                                    </li>
                                                <?php } ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                        </ul>
                    </li>
                </ul>
            </aside>
        <?php }
    }
} ?>