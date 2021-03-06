<?php echo $this->NetCommonsHtml->css(
	'/school_informations/css/header.css',
	['inline' => false]
); ?>
<div class="school-information-header">
	<div class="school-information-header-school-badge">
		<?php echo $this->SchoolInformation->schoolBadge('middle');?>
	</div>
	<div class="school-information-header-text">
		<h1 class="school-information-header-title">
			<?php echo $this->SchoolInformation->display(
				'school_name_kana',
				['tag' => 'div']
			); ?>

			<div>
				<?php echo h($schoolInformation['SchoolInformation']['school_name']); ?>

			</div>
			<?php echo $this->SchoolInformation->display('school_name_roma', ['tag' => 'div']); ?>
		</h1>
		<div>
			<?php echo $this->SchoolInformation->displayLocation(); ?>
			<?= $this->SchoolInformation->display(
				'tel',
				['tag' => 'span', 'displayLabel' => true]
			); ?>
			<?= $this->SchoolInformation->display(
				'fax',
				['tag' => 'span', 'displayLabel' => true]
			); ?>
			<?= $this->SchoolInformation->display(
				'contact',
				['tag' => 'span']
			); ?>
			<?= $this->SchoolInformation->display(
				'email',
				['tag' => 'span']
			); ?>
			<?= $this->SchoolInformation->display(
				'emergency_contact',
				['tag' => 'span']
			); ?>
			<?= $this->SchoolInformation->display(
				'url',
				['tag' => 'span']
			); ?>

		</div>
		<div class="school-information-header-sub-items">
			<?php
			$fields = [
				'principal',
				'school_type',
				'school_kind',
				'student_category',
				'establish_year_month',
				'close_year_month',

				'number_of_male_students'=> [
					'format' => __d('school_informations', '%d persons')
				],
				'number_of_female_students'=> [
					'format' => __d('school_informations', '%d persons')
				],
				'number_of_faculty_members' => [
					'format' => __d('school_informations', '%d persons')
				]

			];

			foreach ($fields as $index => $field) {
				$extraOptions = [];
				if (is_array($field)) {
					$extraOptions = $field;
					$field = $index;
				}

				switch ($field) {
					case 'principal':
						if ($this->SchoolInformation->isDisplayPrincipal()) {
							echo '<span class="school-information-record-item">';
							echo $this->SchoolInformation->label('principal_name', __d('school_informations', 'Principal Name'));
							echo $this->SchoolInformation->displayPrincipal();
							echo '</span>';
						}
						break;
					default:
						$extraOptions['displayLabel'] = true;
						$extraOptions['tag'] = 'span';
						echo $this->SchoolInformation->display($field, $extraOptions);
				}
			}
			?>
		</div>
	</div>
	<?php //echo $this->element('SchoolInformations.SchoolInformation/table');?>
</div>
