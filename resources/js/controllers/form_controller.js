import { Controller } from "stimulus"
import $ from 'jquery'

export default class extends Controller {
  connect() {
    console.log(this.state)

    if (this.state == 'disabled') {
      this.element.querySelectorAll('input').forEach((input) => {
        input.setAttribute('disabled', 'true')
      })
      this.element.querySelectorAll('select').forEach((select) => {
        select.setAttribute('disabled', 'true')
      })
    }
  }

  dateClick(event) {
    let conflictYear = +this.data.get('conflict-year')
    let input = $(event.currentTarget).find('.flatpickr-input[type="hidden"]')[0]
    let date = input._flatpickr

    if (input.value)
        return;

    date.setDate(conflictYear + "-1-1")
  }

  dateClear(event) {
      event.preventDefault()
  }

  radio(event) {
    /*let target = event.target;

    if (target.type !== 'radio')
      return;
    
    console.log(target, target.checked)*/

  }

  submit(event) {
    this.element.submit()
  }

  get state() {
    return this.data.get('state')
  }

  delete(event) {
    var confirm = prompt("Really delete this DCJ?", "Yes do it!");
    if (confirm == null || confirm == "") {
      event.preventDefault()
    } else {
      return true;
    }
  }
}