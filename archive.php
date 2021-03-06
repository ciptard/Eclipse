<?php 
/**
* Archive template used by Eclipse.
*
* Authors: Tyler Cunningham, Trent Lapinski
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Eclipse.
* @since 1.0
*/

	global $options, $themeslug, $post, $content_grid; // call globals
	
/* Header call. */

	response_sidebar_init();
	get_header(); 
	
/* End header. */

?>

<div class="container">
	<div class="row">
	<!--Begin @response before content sidebar hook-->
		<?php response_before_content_sidebar(); ?>
	<!--End @response before content sidebar hook-->
	
	<div id="content" class="<?php echo $content_grid; ?>">
	
	<?php if (have_posts()) : ?>
		
		<!--Begin @response before_archive hook-->
			<?php response_before_archive(); ?>
		<!--End @response before_archive hook-->
		
		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post_container">
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
			<!--Begin @response archive hook-->
				<?php response_loop(); ?>
			<!--End @response archive hook-->
			
			</div><!--end post_class-->	
		</div><!--end post container--> 


		 <?php endwhile; ?>
	 
	 <?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>

		<!--Begin @response pagination hook-->
			<?php response_pagination(); ?>
		<!--End @response pagination hook-->
		
		<!--Begin @response after_archive hook-->
			<?php response_after_archive(); ?>
		<!--End @response after_archive hook-->
	
		</div><!--end content_padding-->

	<!--Begin @response after content sidebar hook-->
		<?php response_after_content_sidebar(); ?>
	<!--End @response after content sidebar hook-->
	
		</div><!--end content-->
	</div><!--end row-->
		<?php if ($options->get($themeslug.'_archive_breadcrumbs') == "1") { response_breadcrumbs();}?>
</div><!--end container-->

<div class="push"></div>
</div> <!-- End of wrapper -->
<?php get_footer(); ?>