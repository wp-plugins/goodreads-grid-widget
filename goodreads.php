<?php
/*
Plugin Name: Wordpress Goodreads Grid Widget
Plugin URI: http://neuronafugada.wordpress.com/2012/08/09/goodreads-grid-widget/
Description: Show an array of your Goodreads books covers.Based on the Goodreads "Grid Widget" (see "Edit Profile/Widgets") and the 
             Wordpress Widget tutorial by James Bruce (http://www.makeuseof.com/tag/how-to-create-wordpress-widgets/).
Author: invik
Version: 1
Author URI: https://neuronafugada.wordpress.com/
*/
 
 
class GoodreadsGridWidget extends WP_Widget
{
  function GoodreadsGridWidget()
  {
    $widget_ops = array('classname' => 'GoodreadsGridWidget', 'description' => 'Show array of Goodreads books covers.' );
    $this->WP_Widget('GoodreadsGridWidget', 'Goodreads Grid:', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 
		'title' => '',
		'userid' => '',
		'shelf' => 'read',
		'sort_crit' => 'date_read',
		'sort_order' => 'a',
		'num' => '20',
		'cover_size' => 'small',
		'hide_title' => '',
		'hide_link' => ''
	 ) );
    $title = $instance['title'];
    $userid = $instance['userid'];    
    $shelf = $instance['shelf'];
    $sort_crit = $instance['sort_crit'];
    $sort_order = $instance['sort_order'];
    $num = $instance['num'];
    $cover_size = $instance['cover_size'];
    $hide_title = $instance['hide_title'];
    $hide_link = $instance['hide_link'];

?>
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id('userid'); ?>">User ID:</label>
	<input class="widefat" id="<?php echo $this->get_field_id('userid'); ?>" name="<?php echo $this->get_field_name('userid'); ?>" type="text" value="<?php echo attribute_escape($userid); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id('num'); ?>">How many covers: </label>
	<input id="<?php echo $this->get_field_id('num'); ?>" name="<?php echo $this->get_field_name('num'); ?>" type="text" value="<?php echo attribute_escape($num); ?>" maxlength="3" size="3" />
</p>

<p>
	<label for="<?php echo $this->get_field_id('shelf'); ?>">From shelf:</label>
	<select class="widefat" id="<?php echo $this->get_field_id('shelf'); ?>" name="<?php echo $this->get_field_name('shelf'); ?>" >
		<option <?php if(attribute_escape($shelf)=="read") { echo 'selected="selected"';} ?> value="read">Read</option>
		<option <?php if(attribute_escape($shelf)=="curr") { echo 'selected="selected"';} ?> value="curr">Currently reading</option>
		<option <?php if(attribute_escape($shelf)=="to-read") { echo 'selected="selected"';} ?> value="to-read">To read</option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id('sort_crit'); ?>">Sorted by...</label>
	<select class="widefat" id="<?php echo $this->get_field_id('sort_crit'); ?>" name="<?php echo $this->get_field_name('sort_crit'); ?>" >
		<option <?php if(attribute_escape($sort_crit)=="asin") { echo 'selected="selected"';} ?> value="asin">ASIN</option>
		<option <?php if(attribute_escape($sort_crit)=="author") { echo 'selected="selected"';} ?> value="author">Author</option>
		<option <?php if(attribute_escape($sort_crit)=="avg_rating") { echo 'selected="selected"';} ?> value="avg_rating">Average rating</option>
		<option <?php if(attribute_escape($sort_crit)=="comments") { echo 'selected="selected"';} ?> value="comments">Comments</option>
		<option <?php if(attribute_escape($sort_crit)=="condition") { echo 'selected="selected"';} ?> value="condition">Condition</option>
		<option <?php if(attribute_escape($sort_crit)=="cover") { echo 'selected="selected"';} ?> value="cover">Cover</option>
		<option <?php if(attribute_escape($sort_crit)=="date_added") { echo 'selected="selected"';} ?> value="date_added">Date added</option>
		<option <?php if(attribute_escape($sort_crit)=="date_pub") { echo 'selected="selected"';} ?> value="date_pub">Date published</option>
		<option <?php if(attribute_escape($sort_crit)=="date_pub_edition") { echo 'selected="selected"';} ?> value="date_pub_edition">Date ed. published</option>
		<option <?php if(attribute_escape($sort_crit)=="date_purchased") { echo 'selected="selected"';} ?> value="date_purchased">Date purchased</option>
		<option <?php if(attribute_escape($sort_crit)=="date_read") { echo 'selected="selected"';} ?> value="date_read">Date read</option>
		<option <?php if(attribute_escape($sort_crit)=="date_started") { echo 'selected="selected"';} ?> value="date_started">Date started</option>
		<option <?php if(attribute_escape($sort_crit)=="date_updated") { echo 'selected="selected"';} ?> value="date_updated">Date updated</option>
		<option <?php if(attribute_escape($sort_crit)=="format") { echo 'selected="selected"';} ?> value="format">Format</option>
		<option <?php if(attribute_escape($sort_crit)=="isbn") { echo 'selected="selected"';} ?> value="isbn">ISBN</option>
		<option <?php if(attribute_escape($sort_crit)=="isbn13") { echo 'selected="selected"';} ?> value="isbn13">ISBN13</option>
		<option <?php if(attribute_escape($sort_crit)=="notes") { echo 'selected="selected"';} ?> value="notes">Notes</option>
		<option <?php if(attribute_escape($sort_crit)=="num_pages") { echo 'selected="selected"';} ?> value="num_pages">Num pages</option>
		<option <?php if(attribute_escape($sort_crit)=="num_ratings") { echo 'selected="selected"';} ?> value="num_ratings">Num ratings</option>
		<option <?php if(attribute_escape($sort_crit)=="owned") { echo 'selected="selected"';} ?> value="owned">Owned</option>
		<option <?php if(attribute_escape($sort_crit)=="position") { echo 'selected="selected"';} ?> value="position">Position</option>
		<option <?php if(attribute_escape($sort_crit)=="purchase_location") { echo 'selected="selected"';} ?> value="purchase_location">Purchase location</option>
		<option <?php if(attribute_escape($sort_crit)=="random") { echo 'selected="selected"';} ?> value="random">Random</option>
		<option <?php if(attribute_escape($sort_crit)=="rating") { echo 'selected="selected"';} ?> value="rating">Rating</option>
		<option <?php if(attribute_escape($sort_crit)=="read_count") { echo 'selected="selected"';} ?> value="read_count">Read count</option>
		<option <?php if(attribute_escape($sort_crit)=="recommender") { echo 'selected="selected"';} ?> value="recommender">Recommender</option>
		<option <?php if(attribute_escape($sort_crit)=="review") { echo 'selected="selected"';} ?> value="review">Review</option>
		<option <?php if(attribute_escape($sort_crit)=="shelves") { echo 'selected="selected"';} ?> value="shelves">Shelves</option>
		<option <?php if(attribute_escape($sort_crit)=="title") { echo 'selected="selected"';} ?> value="title">Title</option>
		<option <?php if(attribute_escape($sort_crit)=="votes") { echo 'selected="selected"';} ?> value="votes">Votes</option>
		<option <?php if(attribute_escape($sort_crit)=="year_pub") { echo 'selected="selected"';} ?> value="year_pub">Year pub</option>
	</select>
	<br />
	<select class="widefat" id="<?php echo $this->get_field_id('sort_order'); ?>" name="<?php echo $this->get_field_name('sort_order'); ?>" >
		<option  value="a"    <?php if(attribute_escape($sort_order)=="a")    { echo 'selected="selected"';} ?> >Ascending</option>
		<option  value="d"    <?php if(attribute_escape($sort_order)=="d")    { echo 'selected="selected"';} ?> >Descending</option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id('cover_size'); ?>">Image size:</label>
	<select class="widefat" id="<?php echo $this->get_field_id('cover_size'); ?>" name="<?php echo $this->get_field_name('cover_size'); ?>" >
		<option <?php if(attribute_escape($cover_size)=="small") { echo 'selected="selected"';} ?> value="small">Small</option>
		<option <?php if(attribute_escape($cover_size)=="medium") { echo 'selected="selected"';} ?> value="medium">Medium</option>
	</select>
</p>

<p>
	<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hide_title'); ?>" name="<?php echo $this->get_field_name('hide_title'); ?>" <?php if(attribute_escape($hide_title)) { echo 'checked="checked"';} ?> />
	<label for="<?php echo $this->get_field_id('hide_title'); ?>"> Hide book titles</label>
	<br/>
	<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hide_link'); ?>" name="<?php echo $this->get_field_name('hide_link'); ?>" <?php if(attribute_escape($hide_link)) { echo 'checked="checked"';} ?> />
	<label for="<?php echo $this->get_field_id('hide_link'); ?>"> Hide links</label>
</p>

<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['userid'] = $new_instance['userid'];
    $instance['shelf'] = $new_instance['shelf'];
    $instance['sort_crit'] = $new_instance['sort_crit'];
    $instance['sort_order'] = $new_instance['sort_order'];
    $instance['num'] = $new_instance['num'];
    $instance['cover_size'] = $new_instance['cover_size'];
    $instance['hide_title'] = $new_instance['hide_title'];
    $instance['hide_link'] = $new_instance['hide_link'];    
    
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
    $paramstr = "http://www.goodreads.com/review/grid_widget/" . $instance['userid'];;
	$paramstr .= "?cover_size=" . $instance['cover_size'];
 	$paramstr .= "&hide_link=" . ($instance['hide_link'] ? 'true' : '');
	$paramstr .= "&hide_title=" . ($instance['hide_title'] ? 'true' : '');
	$paramstr .= "&num_books=" . $instance['num'];
	$paramstr .= "&order=" . $instance['sort_order'];
	$paramstr .= "&shelf=" . $instance['shelf'];
	$paramstr .= "&sort=" . $instance['sort_crit'];
	$paramstr .= "&widget_id=";

?>

	<style type="text/css" media="screen">
		.gr_grid_container { /* customizable */	} 
		.gr_grid_book_container { 
			float: left;
			width: 40px; 
			height: 60px; 
			padding: 0px 0px;
			overflow: hidden; 
        }
	</style>

	<div id="gr_grid_widget_">
		<div class="gr_grid_container">
			<br style="clear: both"/>
			<br/>
			<a href="http://www.goodreads.com/user/show/<?php echo $paramstr; ?>" class="gr_grid_branding" style="font-size: .9em; color: #382110; text-decoration: none; float: right; clear: both">Favorite books »</a>
			
			<noscript>
				Share <a href="http://www.goodreads.com">book reviews</a> and ratings, and even join a <a href="http://www.goodreads.com/group/">book club</a> on Goodreads.
			</noscript>
		</div>
	</div>
	<script src="<?php echo $paramstr; ?>" type="text/javascript" charset="utf-8"></script>


<?php
	 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("GoodreadsGridWidget");') );?>