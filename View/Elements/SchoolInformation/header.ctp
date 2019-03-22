<?php echo $this->NetCommonsHtml->css('/school_informations/css/header.css', ['inline' => false]); ?>
<div class="school-information-header">
	<div class="school-information-header-title">
		<?php
		if (isset($schoolInformation['UploadFile']['school_badge']['id'])):?>
			<div class="school-information-school-badge">
				<?php
				echo $this->NetCommonsHtml->image(
					'/school_informations/school_informations/school_badge?size=main',
					['class' => '']
				);
				?>
			</div>
		<?php endif; ?>
		<h1>
			<ruby>
				<?php echo h($schoolInformation['SchoolInformation']['school_name']); ?>

				<?php echo $this->SchoolInformation->display('school_name_kana', ['tag' => 'rt']);?>
			</ruby>
			<?php echo $this->SchoolInformation->display('school_name_roma', ['tag' => 'div']);?>
		</h1>
	</div>
</div>