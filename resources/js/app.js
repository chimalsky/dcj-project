import { Application } from "stimulus"
import { definitionsFromContext } from "stimulus/webpack-helpers"

import $ from 'jquery'
import 'foundation-sites'
import 'datatables.net-zf'

import trix from 'trix'

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

initDateInputs()

function initDateInputs() {
    let $dateInputs = $("input[type='date']")
    flatpickr($dateInputs, {
        altInput: true,
        altFormat: "F j, Y",
    })
}



