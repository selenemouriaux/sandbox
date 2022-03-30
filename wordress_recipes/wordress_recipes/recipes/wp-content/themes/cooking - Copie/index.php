
<?php get_header(); ?>

<div class="MainContent sidebared layout ">
    <main class="MainContent-content Content">
        <h2 class="Content-title">Toutes les astuces</h2>
        <div class="Content-postsList">
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <article class="Content-postslist-post Post">
                <h3 class="Post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                
                <?php the_post_thumbnail('medium',['class'=>'Post-img']) ?>
                <nav class="Post-catNav">
                    <p class="Post-catNav-auteur">Posté par <a href="#" class="Post-catNav-auteur-link"><?php the_author(); ?></a></p>
                    <p class="Post-catNav-date"><?php the_date(); ?></p>
                </nav>
                <div class="Post-content">               
                    <?php the_excerpt() ?>
                    <a href="<?php the_permalink(); ?>" class="Post-content-link"><img src="<?= get_template_directory_uri()?>/assets/img/icons/more.png"></a>
                </div>
            </article>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </main>
    <?php get_sidebar(); ?>
</div>
    
<?php get_footer(); ?>