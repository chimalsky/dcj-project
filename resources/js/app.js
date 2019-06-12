import { Application } from "stimulus"
import { definitionsFromContext } from "stimulus/webpack-helpers"

import $ from 'jquery'
import 'foundation-sites'
import 'datatables.net-zf'

import trix from 'trix'
import turbolinks from 'turbolinks'

import flatpickr from 'flatpickr'
import 'flatpickr/dist/flatpickr.min.css'

import '@github/auto-complete-element'

/**
 * On initial page load
 */

const application = Application.start()
const context = require.context("./controllers", true, /\.js$/)
application.load(definitionsFromContext(context))


window.$ = $
window.flatpickr = flatpickr

$(document).foundation()

turbolinks.start()  

document.addEventListener('turbolinks:load', function() {
})

function initDateInputs() {
    let $dateInputs = $("input[type='date']")
    flatpickr($dateInputs, {
        altInput: true,
        altFormat: "F j, Y",
    })
}

function initEnglishBooleans() {    
    $('.english-boolean input[type=radio]').each(function(i, el) {
        if (el.checked)
            $(el).attr('data-checked', true);
    })

    $('.english-boolean input[type=radio]').click(function(ev) {
        let target = ev.target,
            inputs = $(target).parent().parent().find('input'),
            nullRadioInput = $(target).parent().parent().find('input[value=""]');

        if ($(target).attr('data-checked')) {
            $(inputs).removeAttr('data-checked')    
                .removeAttr('checked')
                .each((i,el) => {
                    el.checked = false
                });
        } else {
            $(inputs).removeAttr('data-checked')    
                .removeAttr('checked');

            $(target).attr('data-checked', true)
            
            console.log('false')
        }
    })
}

