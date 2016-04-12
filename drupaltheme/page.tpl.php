<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

function taxonomy_node_get_terms($node, $key = 'tid') {
    static $terms;
    if (!isset($terms[$node->vid][$key])) {
        $query = db_select('taxonomy_index', 'r');
        $t_alias = $query->join('taxonomy_term_data', 't', 'r.tid = t.tid');
        $v_alias = $query->join('taxonomy_vocabulary', 'v', 't.vid = v.vid');
        $query->fields($t_alias);
        $query->condition("r.nid", $node->nid);
        $result = $query->execute();
        $terms[$node->vid][$key] = array();
        foreach ($result as $term) {
            $terms[$node->vid][$key][$term->$key] = $term;
        }
    }
    return $terms[$node->vid][$key];
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title><?php print $head_title ?> </title>
        <?php print $styles ?>
        <!-- <base href="/sites/all/themes/mattbirgit/" />-->
        <script type="text/javascript" src="/sites/all/themes/mattbirgit/jquery-1.7.1.js"></script>

        <?php
        $display_blog_menu = false;
        if (count((taxonomy_node_get_terms(node_load(arg(1)), 2))) > 0)
            $display_blog_menu = true;
        else if ((arg(0) === "taxonomy") || (arg(0) === "aggregator"))
            $display_blog_menu = true;
        else if ((arg(0)==="node") && (arg(1) == 42)) $display_blog_menu = true;

        if (!$display_blog_menu) {
            ?>
            <style>
                #block-menu-menu-blogs {display: none;}
            </style>
            <?php
        }
        ?>

    </head>

    <body style="margin:0px; padding:0px;">
        <div style= "margin:auto; width:960px;">
            <div id ="topbar" class ="topbardiv" style ="width:960px; float:left;"><a href="/""><img class ="layoutimages" src="/sites/all/themes/mattbirgit/top_left.png"></a><a href="/node/36"><img class ="layoutimages" src="/sites/all/themes/mattbirgit/top_mid_left.png" onmouseover="$(this).attr('src', '/sites/all/themes/mattbirgit/top_mid_left_a.png')" onmouseout="$(this).attr('src', '/sites/all/themes/mattbirgit/top_mid_left.png')"></a><a href="/node/25"><img class ="layoutimages" src="/sites/all/themes/mattbirgit/top_mid_right.png" onmouseover="$(this).attr('src', '/sites/all/themes/mattbirgit/top_mid_right_a.png')" onmouseout="$(this).attr('src', '/sites/all/themes/mattbirgit/top_mid_right.png')"></a><a href="/node/42"><img class ="layoutimages" src="/sites/all/themes/mattbirgit/top_right.png" onmouseover="$(this).attr('src', '/sites/all/themes/mattbirgit/top_right_a.png')" onmouseout="$(this).attr('src', '/sites/all/themes/mattbirgit/top_right.png')"></a></div>
            <div id="topmain" class="topbardiv" style ="width:960px; float:left;"><img class="layoutimages" src="/sites/all/themes/mattbirgit/middle_top.png"></div>

            <div style="width:960px;">
                <div id="container3">
                    <div id="container2">
                        <div id="container1">
                            <div id="col1" style="background-image: url('/sites/all/themes/mattbirgit/middle_left.png');">

                                        <?php if ($page['sidebar_first']): ?>
                                    <div id="sidebar-first" class="column sidebar"><div class="section region">
    <?php print render($page['sidebar_first']); ?>



                                        </div></div> <!-- /.section, /#sidebar-first -->
<?php endif; ?>



                            </div>
                            <div id="col2"><div style="padding:10px;">





                                    <?php if (arg(0)==="node")  print "<h3 class=\"feed-item-title\">$title</h3>"; print render($page['content']);
                                    ?>


                                </div></div>
                            <div id="col3"><img class="layoutimages" src="/sites/all/themes/mattbirgit/middle_right.png"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="bottombar" class="topbardiv" style="width:960px; float:left;"><img class="layoutimages" src="/sites/all/themes/mattbirgit/bottom.png"></div>
        </div>
    </body>
</html>
