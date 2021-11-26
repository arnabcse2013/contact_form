<?php

namespace Drupal\contact_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ContactForm extends FormBase {
	
	public function getFormId(){
		return 'contact_form';
	}
	
	public function buildForm(array $form, FormStateInterface $form_state) {
		$form['candidate_name'] = array(
		  '#type' => 'textfield',
		  '#title' => t('Candidate Name:'),
		  '#placeholder' => $this->t('Enter Candidate Name'),
		);
		$form['candidate_mail'] = array(
		  '#type' => 'textfield',
		  '#title' => t('Email ID:'),
		  '#placeholder' => $this->t('Enter Candidate Email ID'),
		);
		$form['candidate_number'] = array (
		  '#type' => 'textfield',
		  '#title' => t('Mobile no'),
		  //'#attributes'  => ['size' => 10],
		  '#attributes' => array('maxlength' => 10),
		  '#placeholder' => $this->t('Enter Candidate Mobile Number'),
		);
		$form['candidate_dob'] = array (
		  '#type' => 'date',
		  '#title' => t('DOB'),
		);
		$form['candidate_gender'] = array (
		  '#type' => 'select',
		  '#title' => ('Gender'),
		  '#options' => array(
			'' => t('--Select--'),
			'Female' => t('Female'),
			'male' => t('Male'),
		  ),
		);
		$form['candidate_confirmation'] = array (
		  '#type' => 'radios',
		  '#title' => ('Are you above 18 years old?'),
		  '#options' => array(
			'Yes' =>t('Yes'),
			'No' =>t('No')
		  ),
		);
		$form['candidate_copy'] = array(
		  '#type' => 'checkbox',
		  '#title' => t('I confirm the above details provided by me is true to the best of my knowledge.'),
		);
		$form['actions']['#type'] = 'actions';
		$form['actions']['submit'] = array(
		  '#type' => 'submit',
		  '#value' => $this->t('Save'),
		  '#button_type' => 'primary',
		);
		return $form;
	}
	
	public function validateForm(array &$form, FormStateInterface $form_state) {
		
		if (strlen($form_state->getValue('candidate_name')) == '') {
			$form_state->setErrorByName('candidate_name', $this->t('Candidate Name cannot be empty.'));
		}
		
		if (!$form_state->getValue('candidate_mail') || !filter_var($form_state->getValue('candidate_mail'), FILTER_VALIDATE_EMAIL)) {
            $form_state->setErrorByName('candidate_mail', $this->t('Please enter a valid Email Address.'));
        }
		
		if (strlen($form_state->getValue('candidate_number')) != 10) {
			$form_state->setErrorByName('candidate_number', $this->t('Mobile number should be 10 digits.'));
		}
		
		if (strlen($form_state->getValue('candidate_dob')) == '') {
			$form_state->setErrorByName('candidate_dob', $this->t('Enter Candidate DOB.'));
		}
		
		if (strlen($form_state->getValue('candidate_gender')) == '') {
			$form_state->setErrorByName('candidate_gender', $this->t('Enter Candidate Gender.'));
		}
		
		if (strlen($form_state->getValue('candidate_confirmation')) == '') {
			$form_state->setErrorByName('candidate_confirmation', $this->t('Enter Age Confirmation.'));
		}
		
		if ($form_state->getValue('candidate_copy') == 0) {
			$form_state->setErrorByName('candidate_copy', $this->t('Please confirm the checkbox to proceed.'));
		}

    }
	
	public function submitForm(array &$form, FormStateInterface $form_state) {
		
		$data = array(
            'candidate_name' => $form_state->getValue('candidate_name'),
            'candidate_mail'  => $form_state->getValue('candidate_mail'),
            'candidate_number'     => $form_state->getValue('candidate_number'),
            'candidate_dob'   => $form_state->getValue('candidate_dob'),
            'candidate_gender'   => $form_state->getValue('candidate_gender'),
			'candidate_confirmation'   => $form_state->getValue('candidate_confirmation'),
			'created_datetime' => date('Y-m-d H:i:s'),
        );
		
		$connection = \Drupal\Core\Database\Database::getConnection() ;
		$connection->insert('candidate_info')->fields($data) ->execute();

        drupal_set_message($this->t('Thank you very much @candidate_name for your message. You will receive a confirmation email shortly.', [
            '@candidate_name' => $form_state->getValue('candidate_name'),
        ]));
		
	}
	
}