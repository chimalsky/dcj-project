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

// English Boolean. Later convert to StimulusJS

$('.english-boolean label').click(function(ev) {
    let target = ev.delegateTarget,
        container = target.parentElement,
        input = container.querySelector('input')
    
    if (input.checked == true) {
        input.checked = false
        console.log(input)
    }
})

