<?php 
global $WipFunciones;
$detect = $WipFunciones->detect;
if( ! $detect->isMobile() ): ?>
<div class="twin-hero">
  <!--<div class="hero-shadow">
  </div>-->
  <div class="hero-container">
    <div class="left-hero" id="left-hero">
      <?php if( ! empty( $terms[0]->featured_img ) ) $img_left_attr = wp_get_attachment_image_src( $terms[0]->featured_img, 'full' ); ?>
      <div class="left-hero-tilt" <?php echo ( ! empty( $terms[0]->featured_img ) ) ? 'style="background: url(' . $img_left_attr[0] . ') no-repeat center center;"' : ''; ?>>
        <div class="side-container">
          <div class="initial active">
            <h2 class="frase"><?php echo $terms[0]->name; ?></h2>
            <p><?php echo $terms[0]->description; ?></p>
            <span class="round-icon">+</span>
          </div>
          <div class="collapsed">
            <h2 class="frase"><?php echo $terms[0]->name; ?></h2>
            <span class="round-filled-icon">+</span>
          </div>
          <div class="expanded">
            <h2 class="frase"><?php echo $terms[0]->name; ?></h2>
            <?php if ( $queries[0]->have_posts() ): ?>
              <div class="hero-twin-items">
                <?php while ( $queries[0]->have_posts() ): $queries[0]->the_post(); 
                  $post_url = get_post_meta( get_the_id(), 'wip_slider_url', true ); //ponerle prefijo
                  ?>
                  <a href="<?php echo (!empty( $post_url )) ? $post_url : '#'; ?>" class="hero-twin-item">
                    <?php if( ! empty( get_post_thumbnail_id() ) ): 
                      $img_attr = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                      $img_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                    ?>
                      <img class="hero-twin-item-icon-temp" src="<?php echo $img_attr[0]; ?>" alt="<?php echo $img_alt; ?>">
                    <?php else: ?>
                      <div data-class="icon-biz-1-opt" id="bifBizIcon1" class="hero-twin-item-icon icon-biz-1-opt"></div>
                    <?php endif; ?>
                    <p class="frase"><?php echo get_the_title(); ?></p>
                    <!--<p><?php echo get_the_content(); ?></p>-->
                  </a>
                <?php endwhile; ?>
              </div>
            <?php wp_reset_postdata(); endif; ?>
            <a target="_blank" href="<?php echo $terms[0]->link_url; ?>" class="btn btn-outline-white btn-lg waves-effect">VER TODOS</a>
          </div>
        </div>
      </div>
    </div>
    <div class="right-hero" id="right-hero">
      <?php if( ! empty( $terms[1]->featured_img ) ) $img_right_attr = wp_get_attachment_image_src( $terms[1]->featured_img, 'full' ); ?>
      <div class="right-hero-tilt" <?php echo ( ! empty( $terms[1]->featured_img ) ) ? 'style="background: url(' . $img_right_attr[0] . ') no-repeat center center;"' : ''; ?>>
        <div class="side-container">
          <div class="initial active">
            <h2 class="frase"><?php echo $terms[1]->name; ?></h2>
            <p><?php echo $terms[1]->description; ?></p>
            <span class="round-icon">+</span>
          </div>
          <div class="collapsed">
            <h2 class="frase"><?php echo $terms[1]->name; ?></h2>
            <span class="round-filled-icon">+</span>
          </div>
          <div class="expanded">
            <h2 class="frase"><?php echo $terms[1]->name; ?></h2>      
            <?php if ( $queries[1]->have_posts() ): ?>
              <div class="hero-twin-items">
                <?php while ( $queries[1]->have_posts() ): $queries[1]->the_post(); 
                  $post_url = get_post_meta( get_the_id(), 'wip_slider_url', true ); //ponerle prefijo
                  ?>
                  <a href="<?php echo (!empty( $post_url )) ? $post_url : '#'; ?>" class="hero-twin-item">
                    <?php if( ! empty( get_post_thumbnail_id() ) ): 
                      $img_attr = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                      $img_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                    ?>
                      <img class="hero-twin-item-icon-temp" src="<?php echo $img_attr[0]; ?>" alt="<?php echo $img_alt; ?>">
                    <?php else: ?>
                      <div data-class="icon-biz-1-opt" id="bifBizIcon1" class="hero-twin-item-icon icon-biz-1-opt"></div>
                    <?php endif; ?>
                    <p class="frase"><?php echo get_the_title(); ?></p>
                    <!--<p><?php echo get_the_content(); ?></p>-->
                  </a>
                <?php endwhile; ?>
              </div>
            <?php wp_reset_postdata(); endif; ?>
            <a target="_blank" href="<?php echo $terms[1]->link_url; ?>" class="btn btn-outline-white btn-lg waves-effect">VER TODOS</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php else: ?>
  <div class="twin-hero slider-center">
    <div class="hero-container">
      <?php if( ! empty( $terms[0]->featured_img ) ) $img_right_attr = wp_get_attachment_image_src( $terms[0]->featured_img, 'full' ); ?>
      <div class="side-container">
        <input id="tab-one" type="checkbox" name="tabs">
        <label class="w-100" for="tab-one" <?php echo ( ! empty( $terms[0]->featured_img ) ) ? 'style="background: url(' . $img_right_attr[0] . ') no-repeat center center;"' : ''; ?>>
          <h2 class="frase"><?php echo $terms[0]->name; ?></h2>
          <p><?php echo $terms[0]->description; ?></p>
        </label>
        <div class="tab-content">
            <?php if ( $queries[0]->have_posts() ): ?>
              <div class="hero-twin-items">
                <?php while ( $queries[0]->have_posts() ): $queries[0]->the_post(); 
                  $post_url = get_post_meta( get_the_id(), 'wip_slider_url', true ); //ponerle prefijo
                  ?>
                  <a href="<?php echo (!empty( $post_url )) ? $post_url : '#'; ?>" class="hero-twin-item">
                    <?php if( ! empty( get_post_thumbnail_id() ) ): 
                      $img_attr = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                      $img_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                    ?>
                      <img class="hero-twin-item-icon-temp" src="<?php echo $img_attr[0]; ?>" alt="<?php echo $img_alt; ?>">
                    <?php else: ?>
                      <div data-class="icon-biz-1-opt" id="bifBizIcon1" class="hero-twin-item-icon icon-biz-1-opt"></div>
                    <?php endif; ?>
                    <p class="frase"><?php echo get_the_title(); ?></p>
                    <!--<p><?php echo get_the_content(); ?></p>-->
                  </a>
                <?php endwhile; ?>
              </div>
            <?php wp_reset_postdata(); endif; ?>
            <a target="_blank" href="<?php echo $terms[0]->link_url; ?>" class="btn btn-outline-white btn-lg waves-effect mb-3">VER TODOS</a>
        </div>
      </div>
      <?php if( ! empty( $terms[1]->featured_img ) ) $img_right_attr = wp_get_attachment_image_src( $terms[1]->featured_img, 'full' ); ?>
      <div class="side-container">
        <input id="tab-two" type="checkbox" name="tabs">
        <label class="w-100" for="tab-two" <?php echo ( ! empty( $terms[1]->featured_img ) ) ? 'style="background: url(' . $img_right_attr[0] . ') no-repeat center center;"' : ''; ?>>
          <h2 class="h2"><?php echo $terms[1]->name; ?></h2>
          <p><?php echo $terms[1]->description; ?></p>
        </label>
        <div class="tab-content">
            <?php if ( $queries[1]->have_posts() ): ?>
              <div class="hero-twin-items">
                <?php while ( $queries[1]->have_posts() ): $queries[1]->the_post(); 
                  $post_url = get_post_meta( get_the_id(), 'wip_slider_url', true ); //ponerle prefijo
                  ?>
                  <a href="<?php echo (!empty( $post_url )) ? $post_url : '#'; ?>" class="hero-twin-item">
                    <?php if( ! empty( get_post_thumbnail_id() ) ): 
                      $img_attr = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                      $img_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                    ?>
                      <img class="hero-twin-item-icon-temp" src="<?php echo $img_attr[0]; ?>" alt="<?php echo $img_alt; ?>">
                    <?php else: ?>
                      <div data-class="icon-biz-1-opt" id="bifBizIcon1" class="hero-twin-item-icon icon-biz-1-opt"></div>
                    <?php endif; ?>
                    <p class="frase"><?php echo get_the_title(); ?></p>
                    <!--<p><?php echo get_the_content(); ?></p>-->
                  </a>
                <?php endwhile; ?>
              </div>
            <?php wp_reset_postdata(); endif; ?>
            <a target="_blank" href="<?php echo $terms[1]->link_url; ?>" class="btn btn-outline-white btn-lg waves-effect mb-3">VER TODOS</a>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>