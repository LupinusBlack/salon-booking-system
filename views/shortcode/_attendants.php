<?php
/**
 * @var SLN_Plugin                        $plugin
 * @var string                            $formAction
 * @var string                            $submitName
 * @var SLN_Shortcode_Salon_AttendantsStep $step
 * @var SLN_Wrapper_Attendant[]             $attendants
 */

$ah = $plugin->getAvailabilityHelper();
$ah->setDate($plugin->getBookingBuilder()->getDateTime())
?>
<div class="sln-attendant-list">
    <?php foreach ($attendants as $attendant) : ?>
        <div class="row">
            <div class="col-lg-1 col-md-3 col-xs-2">
            <span class="attendant-radio <?php echo  $bb->hasAttendant($attendant) ? 'is-checked' : '' ?>">
            <?php
            $errors   = $ah->validateAttendant($attendant);
            $settings = array();
            if ($errors) {
                $settings['attrs']['disabled'] = 'disabled';
            }
            ?>

            <?php SLN_Form::fieldRadiobox(
                'sln[attendant]',$attendant->getId(),
                $bb->hasAttendant($attendant),
                $settings
            ) ?>
            </span>
            </div>

            <div class="col-lg-3 col-md-3 col-xs-4">

                <div class="attendant_thumb">
                <?php   if ( has_post_thumbnail($attendant->getId())) { 

                echo get_the_post_thumbnail($attendant->getId(), 'thumbnail'); 

                 }
                ?>
                </div>


            </div>




            <div class="col-lg-8 col-md-6 col-xs-6">


                <label for="<?php echo SLN_Form::makeID('sln[attendant][' . $attendant->getId() . ']') ?>">
                    <strong class="attendant-name"><?php echo $attendant->getName(); ?></strong>
                    <span class="attendant-description"><?php echo $attendant->getContent() ?></span>
                </label>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php if ($errors) : ?>
            <div class="alert alert-warning">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>

    <?php endforeach ?>
</div>
