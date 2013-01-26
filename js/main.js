/* ria.exos.flatland.be - Notes de cours en ligne pour le cours de RIA - Applications Internet Riches
 * coded by Kevin Guéders 2383
 * november 2012
 */

/*jshint nonstandard: true, browser: true, boss: true */
/*global jQuery */

( function ( $ ) {
	"use strict";

	// --- global vars
	var $nom,
		$email,
		$message,
		$form;

	// --- methods
	var validerForm = function(e){
		$('#formu span').remove();
		if($nom.val()=="" || $nom.val()==" " || $email.val()=="" || $email.val()==" " || $message.val()=="" || $message.val()==" "){
			e.preventDefault();
			if($nom.val()=="" || $nom.val()==" "){
				$("<span>Le champ est vide</span>").insertAfter("#nom");
			}
			if($email.val()=="" || $email.val()==" "){
				$("<span>Le champ est vide</span>").insertAfter("#email");
			}
			if($message.val()=="" || $message.val()==" "){
				$("<span>Le champ est vide</span>").insertAfter("#msg");
			}
		}
	}

	$( function () {

		// --- onload routines
		$nom = $("#formu #nom");
		$email = $("#formu #email");
		$message = $("#formu #msg");
		$form = $("#formu");

		$form.on('submit', validerForm);
		
	} );

}( jQuery ) );
