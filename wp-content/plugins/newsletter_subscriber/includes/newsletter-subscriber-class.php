<?php

class Newsletter_Subscriber_Widget extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        $widget_ops = array(
            'description' => __('A simple email subscriber', 'ns_domain'),
        );
        parent::__construct('newsletter_subscriber_widget', __('Newsletter Subscriber', 'ns_domain'), $widget_ops);
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        ?>
        <h3><?= $instance['title'] ?></h3>
        <div id="form-msg"></div>
        <form id="subscriber-form" method="post" action="<?= plugins_url() .'/newsletter_subscriber/includes/newsletter-subscriber-mailer.php' ?>">
            <div class="form-group">
                <label for="name">Name: </label><br>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Email: </label><br>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            <input type="hidden" name="recipient" value="<?= $instance['recipient'] ?>">
            <input type="hidden" name="subject" value="<?= $instance['subject'] ?>">
            <br>
            <input type="submit" class="btn btn-primary" name="subscriber_submit" value="Subscribe">
        </form>
        <br>
        <?php
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance)
    {
        $title = !empty($instance['title']) ? esc_attr($instance['title']) : __('Newsletter Subscriber','ns_domain');
        $recipient = $instance['recipient'];
        $subject = !empty($instance['subject']) ? esc_attr($instance['subject']) : __('You have a new subscriber','ns_domain');
        ?>
        <p>
            <label for="<?= $this->get_field_id('title') ?>"><?= _e('Title:'); ?></label><br>
            <input type="text" id="<?= $this->get_field_id('title') ?>" name="<?= $this->get_field_name('title') ?>" value="<?= $title ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('recipient') ?>"><?= _e('Recipient:'); ?></label><br>
            <input type="text" id="<?= $this->get_field_id('recipient') ?>" name="<?= $this->get_field_name('recipient') ?>" value="<?= $recipient ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('subject') ?>"><?= _e('Subject:'); ?></label><br>
            <input type="text" id="<?= $this->get_field_id('subject') ?>" name="<?= $this->get_field_name('subject') ?>" value="<?= $subject ?>">
        </p>
        <?php
    }


    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array(
            'title' => !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '',
            'recipient' => !empty($new_instance['recipient']) ? strip_tags($new_instance['recipient']) : '',
            'subject' => !empty($new_instance['subject']) ? strip_tags($new_instance['subject']) : ''
        );
        return $instance;
    }
}