<div class="sln-tab" id="sln-tab-general">
    <div class="row">
        <div class="col-md-3 col-sm-4">
            <?php
            $this->row_input_text(
                'gen_name',
                __('Your salon name', 'sln'),
                array(
                    'help' => sprintf(
                        __('Leaving this field empty will cause the default site name <strong>(%s)</strong> to be used', 'sln'),
                        get_bloginfo('name')
                    )
                )
            );
            ?>
        </div>
        <div class="col-md-3 col-sm-4">
            <?php
            $this->row_input_text(
                'gen_email',
                __('Salon contact e-mail', 'sln'),
                array(
                    'help' => sprintf(
                        __('Leaving this field empty will cause the default site email  <strong>(%s)</strong> to be used', 'sln'),
                        get_bloginfo('admin_email')
                    )
                )
            );
            ?>
        </div>
        <div class="col-md-3 col-sm-4">
            <?php $this->row_input_text('gen_phone', __('Salon telephone number', 'sln')); ?>
        </div>
    </div>
    <div class="sln-separator"></div>
    <div class="row">
        <div class="col-md-3">
            <?php $this->row_input_textarea(
                'gen_address',
                __('Salon address', 'sln'),
                array(
                    'textarea' => array(
                        'attrs' => array(
                            'rows' => 3,
                            'placeholder' => 'write your address'
                        )
                    )
                )
            ); ?>
        </div>
        <div class="col-md-6">
            <?php $this->row_input_textarea(
                'gen_timetable',
                __('Bookings notes', 'sln'),
                array(
                    'help' => 'Use this field to provide your customers important infos about terms and conditions of their reservation.',
                    'textarea' => array(
                        'attrs' => array(
                            'rows' => 3,
                            'placeholder' => "e.g. In case of delay we will take your seat for 15 minutes, then your booking priority will be lost"
                        )
                    )
                )
            ); ?>
        </div> 
    </div>
    <div class="sln-separator"></div>
    <div class="row">
        <div class="col-md-3">
            <?php $this->row_input_checkbox('attendant_enabled', __('Enable assistant selection', 'sln')); ?>
            <p><?php _e('Let your customers choose their favourite staff member.', 'sln') ?></p>

            <p><?php echo sprintf(__('You need to add your members staff <a href="%s">Here</a>.', 'sln'),
                    get_admin_url().'edit.php?post_type=sln_attendant') ?></p>
            <?php $this->row_input_checkbox('attendant_email', __('Enable assistant email on new bookings', 'sln')); ?>
            <p><?php _e('Assistants will receive an e-mail when selected for a new booking.', 'sln') ?></p><br/>
            <?php $this->row_input_checkbox('ajax_enabled', __('Enable ajax steps', 'sln')); ?>
            <p><?php _e('This allows loading steps via ajax.', 'sln') ?></p>
			<?php $this->row_input_checkbox('hide_prices', __('Hide Prices', 'sln')); ?>
            <p><?php _e('Select this Option if you want to hide all prices from the front end.<br/>Note: Online Payment will be disabled.', 'sln') ?></p>

        </div>
        <div class="col-md-6">
            <?php $this->row_input_checkbox('sms_enabled', __('Enable SMS verification', 'sln')); ?>
            <p><?php _e('Avoid spam asking your users to verify their identity with an SMS verification code during the first registration.', 'sln') ?></p>
            <label>        <?php _e('Select your service provider', 'sln') ?></label>
            <?php $field = "salon_settings[sms_provider]"; ?>
            <?php echo SLN_Form::fieldSelect(
                $field,
                SLN_Enum_SmsProvider::toArray(),
                $this->getOpt('sms_provider'),
                array(),
                true
            ) ?>
            <!-- form-group END -->

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <?php $this->row_input_text('sms_account', __('Account', 'sln')); ?>
                </div>
                <div class="col-md-6 col-sm-6">
                    <?php $this->row_input_text('sms_password', __('Password', 'sln')); ?>
                </div>
                <div class="col-md-6 col-sm-6">
                    <?php $this->row_input_text('sms_prefix', __('Number Prefix', 'sln')); ?>
                </div>
                <div class="col-md-6 col-sm-6">
                    <?php $this->row_input_text('sms_from', __('Sender\'s number', 'sln')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="sln-separator"></div>
            <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <?php $this->row_input_checkbox('sms_new', __('Send SMS on new bookings', 'sln')); ?>
                    <?php $this->row_input_text('sms_new_number', __('Number', 'sln')); ?>
                    <?php $this->row_input_checkbox('sms_new_attendant', __('Send SMS to attendant on new bookings', 'sln')); ?>
                </div>
                <div class="col-md-6">
                    <?php $this->row_input_checkbox('sms_remind', __('Reminde the appointment via SMS', 'sln')); ?>
                    <?php _e('From', 'sln') ?>
                    <?php $field = "salon_settings[sms_remind_interval]"; ?>
                    <?php echo SLN_Form::fieldSelect(
                        $field,
                        SLN_Func::getIntervalItemsShort(),
                        $this->getOpt('sms_remind_interval'),
                        array(),
                        true
                    ) ?>

                </div>
            </div>
    <div class="sln-separator"></div>
            <h3>Send a test sms</h3>
            <p>Just write here and save settings</p>
            <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <?php $this->row_input_text('sms_test_number', __('Number', 'sln')); ?>
                </div>
                <div class="col-md-6">
                    <?php $this->row_input_text('sms_test_message', __('Message', 'sln')); ?>
                </div>
            </div>
    <div class="sln-separator"></div>

    <div class="row">
        <div class="col-md-10"><h3>Social</h3></div>
        <div class="col-md-3 col-sm-4">
            <?php $this->row_input_text('soc_facebook', __('Facebook', 'sln')); ?>
        </div>
        <div class="col-md-3 col-sm-4">
            <?php $this->row_input_text('soc_twitter', __('Twitter', 'sln')); ?>
        </div>
        <div class="col-md-3 col-sm-4">
            <?php $this->row_input_text('soc_google', __('Google+', 'sln')); ?>
        </div>
    </div>
<br/>
    <div class="row">
        <div class="col-md-3 col-sm-4">
            <label>        <?php _e('Date Format', 'sln') ?></label>
            <?php $field = "salon_settings[date_format]"; ?>
            <?php echo SLN_Form::fieldSelect(
                $field,
                SLN_Enum_DateFormat::toArray(),
                $this->getOpt('date_format'),
                array(),
                true
            ) ?>
        </div>
        <div class="col-md-3 col-sm-4">
            <label>        <?php _e('Time Format', 'sln') ?></label>
            <?php $field = "salon_settings[time_format]"; ?>
            <?php echo SLN_Form::fieldSelect(
                $field,
                SLN_Enum_TimeFormat::toArray(),
                $this->getOpt('time_format'),
                array(),
                true
            ) ?>
        </div>
        <div class="col-md-3 col-sm-4">
            <?php $this->row_input_checkbox('no_bootstrap', __('Hide Bootstrap CSS', 'sln')); ?>
        </div>
    </div>
</div>
