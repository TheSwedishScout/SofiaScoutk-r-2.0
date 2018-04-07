<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
            <small><?php the_time('Y-m-d H:i'). _e(' by ','sofiascoutkar'). the_author_posts_link(); ?></small>
            <p><?php the_content(); ?></p>
            <?php wp_link_pages();?>
            <!-- comments and stuff like that-->
            <!--Categoriies and tags-->
            <?php
            $tags = wp_get_post_tags($post->ID);
            $categories = get_categories( array(
			    'orderby' => 'name',
			    'order'   => 'ASC'
			));
            ?>
            <div class="post_footer">
	            <?php
				$html = '<div class="post_tags">';
				foreach ( $tags as $tag ) {
					$tag_link = get_tag_link( $tag->term_id );
							
					$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
					$html .= "{$tag->name}</a>";
				}
				$html .= '</div>';
				echo $html;
				$post_categories = wp_get_post_categories( $post->ID );
				$cats = array();
				     
				foreach($post_categories as $c){
				    $cat = get_category( $c );
				    //var_dump($cat);
				    $category_link = get_category_link( $cat->cat_ID );
				     
				    $cats[] = (object)[ 'name' => $cat->name, 'slug' => $cat->slug, 'cat_ID' => $cat->cat_ID, 'link' => $category_link ];
				}
				$cat_html = '<div class="post_cats">';
				//var_dump($cats);

				foreach ($cats as $cat) {
					if ($cat->cat_ID != 1){

						$cat_html .= "<a href='{$cat->link}' title='{$cat->name}' class='{$cat->slug}'>";
						$cat_html .= "{$cat->name}</a>";
					}
				}
				$cat_html .= "</div>";
				echo $cat_html;
				//var_dump($cats);
				//if coments are enabled 
				if(comments_open()):
				?>

	            <!--numbers of comments | make new comment (like)-->
	            <h3>
					<?php 
						printf( _nx( __('One Comment', 'sofiascoutkar'), __('%1$s Comments','sofiascoutkar'), get_comments_number(), 'comments title'), number_format_i18n( get_comments_number() ) ); 
					?>
				</h3>
				<?php
				endif;
				?>
			</div>

        </article>