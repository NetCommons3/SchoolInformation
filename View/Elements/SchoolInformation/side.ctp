<?php echo $this->NetCommonsHtml->css('/school_informations/css/side.css', ['inline' => false]); ?>
<article class="school-information-side">
	<div class="school-information-side-image">
		<?php echo $this->SchoolInformation->schoolBadge('small');?>
	</div>

	<div class="school-information-side-school-name">
		<?php echo h($schoolInformation['SchoolInformation']['school_name']); ?>
	</div>

	<?= $this->SchoolInformation->displayLocation(); ?>
	<?= $this->SchoolInformation->display('tel', ['displayLabel' => true]); ?>
	<?= $this->SchoolInformation->display('fax', ['displayLabel' => true]); ?>
	<?= $this->SchoolInformation->display('email'); ?>



	<div style="margin-top: 10px">
		<?php
		$fields = [
			'contact',
			'emergency_contact',
			'url',
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
						echo $this->SchoolInformation->label(
							'principal_name',
							__d('school_informations', 'Principal Name')
						);
						echo $this->SchoolInformation->displayPrincipal();
					}
					break;
				default:
					$extraOptions['displayLabel'] = true;
					echo $this->SchoolInformation->display($field, $extraOptions);
			}
		}
		?>
	</div>


</article>
