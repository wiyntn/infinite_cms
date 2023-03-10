<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="row">

    <?php echo form_open('admin_controller/seo_tools_post'); ?>

    <div class="col-lg-6 col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo trans('seo_tools'); ?></h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages');?>
                <div class="form-group">
                    <label><?php echo trans("language"); ?></label>
                    <select name="lang_id" class="form-control" onchange="window.location.href = '<?php echo admin_url(); ?>'+'seo-tools?lang='+this.value;">
                        <?php foreach ($languages as $language): ?>
                            <option value="<?php echo $language->id; ?>" <?php echo ($selected_lang == $language->id) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo trans('site_title'); ?></label>
                    <input type="text" class="form-control" name="site_title"
                           placeholder="<?php echo trans('site_title'); ?>" value="<?php echo html_escape($settings->site_title); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                </div>

                <div class="form-group">
                    <label class="control-label"><?php echo trans('home_title'); ?></label>
                    <input type="text" class="form-control" name="home_title"
                           placeholder="<?php echo trans('home_title'); ?>" value="<?php echo html_escape($settings->home_title); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                </div>

                <div class="form-group">
                    <label class="control-label"><?php echo trans('site_description'); ?></label>
                    <input type="text" class="form-control" name="site_description"
                           placeholder="<?php echo trans('site_description'); ?>"
                           value="<?php echo html_escape($settings->site_description); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                </div>

                <div class="form-group">
                    <label class="control-label"><?php echo trans('keywords'); ?></label>
                    <textarea class="form-control text-area" name="keywords"
                              placeholder="<?php echo trans('keywords'); ?>"
                              style="min-height: 100px;" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>><?php echo html_escape($settings->keywords); ?></textarea>
                </div>

                <div class="form-group">
                    <label class="control-label"><?php echo trans('google_analytics'); ?></label>
                    <textarea class="form-control text-area" name="google_analytics"
                              placeholder="<?php echo trans('google_analytics_code'); ?>"
                              style="min-height: 100px;" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>><?php echo html_escape($general_settings->google_analytics); ?></textarea>
                </div>

                <!-- /.box-body -->
                <div class="box-footer" style="padding-left: 0; padding-right: 0;">
                    <button type="submit" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
                </div>
                <!-- /.box-footer -->

            </div>
            <!-- /.box -->
        </div>

    </div>
    <?php echo form_close(); ?><!-- form end -->


    <div class="col-lg-6 col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo trans('sitemap'); ?></h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open('sitemap_controller/generate_sitemap_post'); ?>
            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages_form'); ?>

                <div class="form-group">
                    <label class="label-sitemap"><?php echo trans('frequency'); ?></label>
                    <small class="small-sitemap"><?php echo trans('frequency_exp'); ?></small>

                    <select name="frequency" class="form-control">
                        <option value="none"><?php echo trans('none'); ?></option>
                        <option value="always"><?php echo trans('always'); ?></option>
                        <option value="hourly"><?php echo trans('hourly'); ?></option>
                        <option value="daily"><?php echo trans('daily'); ?></option>
                        <option value="weekly"><?php echo trans('weekly'); ?></option>
                        <option value="monthly" selected><?php echo trans('monthly'); ?></option>
                        <option value="yearly"><?php echo trans('yearly'); ?></option>
                        <option value="never"><?php echo trans('never'); ?></option>
                    </select>

                </div>

                <div class="form-group">
                    <label class="label-sitemap"><?php echo trans('last_modification'); ?></label>
                    <small class="small-sitemap"><?php echo trans('last_modification_exp'); ?></small>
                    <div class="form-radio">
                        <input type="radio" id="last_modification_1" name="last_modification" value="none" class="square-purple">
                        <label for="last_modification_1" class="col-option">&nbsp;<?php echo trans('none'); ?></label><br>
                    </div>

                    <div class="form-radio">
                        <input type="radio" id="last_modification_2" name="last_modification" value="server_response" class="square-purple" checked>
                        <label for="last_modification_2">&nbsp;<?php echo trans('server_response'); ?></label>
                    </div>

                    <div class="form-radio">
                        <input type="radio" id="last_modification_3" name="last_modification" value="custom" class="square-purple">
                        <label for="last_modification_3">&nbsp;<?php echo trans('use_this_date'); ?></label>
                        <input type="text" class="form-control input-custom-time" name="lastmod_time"
                               value="<?php echo date("Y-m-d"); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                    </div>
                </div>

                <div class="form-group">
                    <label class="label-sitemap"><?php echo trans('priority'); ?></label>
                    <small class="small-sitemap"><?php echo trans('priority_exp'); ?></small>
                    <div class="form-radio">
                        <input type="radio" id="priority_1" name="priority" value="none" class="square-purple">
                        <label for="priority_1">&nbsp;<?php echo trans('none'); ?></label>
                    </div>

                    <div class="form-radio">
                        <input type="radio" id="priority_2" name="priority" value="automatically" class="square-purple" checked>
                        <label for="priority_2">&nbsp;<?php echo trans('priority_none'); ?></label>
                    </div>

                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" name="process" value="generate" class="btn btn-primary pull-right"><?php echo trans('download_sitemap'); ?></button>
                <button type="submit" name="process" value="update" class="btn btn-success pull-right m-r-10"><?php echo trans('update_sitemap'); ?></button>
            </div>
            <!-- /.box-footer -->

            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->

        <div class="callout" style="margin-top: 30px;background-color: #fff; border-color:#00c0ef;max-width: 600px;">
            <h4>Cron Job</h4>
            <p><strong>http://domain.com/cron/update-sitemap</strong></p>
            <small><?php echo trans('msg_cron_sitemap'); ?></small>
        </div>

    </div>
</div>

<style>
    .form-radio{
        min-height: 34px;
    }
</style>


