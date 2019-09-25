<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 24/09/2019
 * Time: 16:12
 */

class WP_My_Github_Repos extends WP_Widget{

    public function __construct()
    {
        parent::__construct('my_github_repos',
            __('My Github Repos','mgr_domain'),
            array('description' => __('A Github repository widget','mgr_domain')));
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title',$instance['titulo']);
        $username = esc_attr($instance['username']);
        $count = esc_attr($instance['conta']);
        $this->showRepos($title, $username, $count);
    }

    public function form($instance)
    {
        if(isset($instance['titulo'])){
            $title = $instance['titulo'];
        }else{
            $title = __('Latest Github Repos','mgr_domain');
        }

       //Username
       if(isset($instance['username'])){
           $username = $instance['username'];
       }else{
           $username = __('RafaelNercessian','mgr_domain');
       }

       //Count
        if(isset($instance['conta'])){
            $count = $instance['conta'];
        }else{
            $count = 5;
        }

        ?>
        <p>
            <label for="<?= $this->get_field_id('titulo')?>"><?php _e('Title:', 'mgr_domain'); ?></label><br>
            <input type="text" id="<?= $this->get_field_id('titulo')?>"
                   name="<?= $this->get_field_name('titulo')?>" value="<?= esc_html($title)?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('username')?>"><?php _e('Username:', 'mgr_domain'); ?></label><br>
            <input type="text" id="<?= $this->get_field_id('username')?>"
                   name="<?= $this->get_field_name('username')?>" value="<?= esc_html($username)?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('conta')?>"><?php _e('Count:', 'mgr_domain'); ?></label><br>
            <input type="text" id="<?= $this->get_field_id('conta')?>"
                   name="<?= $this->get_field_name('conta')?>" value="<?= esc_html($count) ?>"/>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['titulo'] = (!empty($new_instance['titulo'])) ? strip_tags($new_instance['titulo']) :'';
        $instance['username'] = (!empty($new_instance['username'])) ? strip_tags($new_instance['username']) :'';
        $instance['conta'] = (!empty($new_instance['conta'])) ? strip_tags($new_instance['conta']) :'';
        return $instance;
    }

    public function showRepos($title, $username, $count)
    {
        $url = 'https://api.github.com/users/'.$username.'/repos?sort=created&per_page=' . $count;
        $options = array('http' => array('user_agent' => $_SERVER['HTTP_USER_AGENT']));
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $repos = json_decode($response);
        $output = '<ul class="repos"><h3>'.$title.'</h3>';
        foreach ($repos as $repo){
            $output .= '<li>
                            <div class="repo-title">' .$repo->name .'</div>
                            <div class="repo-desc">' . $repo->description .'</div>
                            <a target="_blank" href="'.$repo->html_url.'">View on Github</a>
                        </li>';

        }
            $output .= '</ul>';
        echo $output;
    }
}

