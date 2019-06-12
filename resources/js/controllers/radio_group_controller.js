import { Controller } from "stimulus"

export default class extends Controller {
    static targets = [ "radio" ]
  
    connect() {
      this.selectedRadioElement = this.radioTargets.find(element => element.checked)
    }
  
    // Actions
  
    select(event) {
      if (this.selectedRadioElement) {
        this.deselect(this.selectedRadioElement)
      } else {
        this.selectedRadioElement = event.target
      }
    }

    // Private

    deselect(element) {
        this.selectedRadioElement = null

        if (element.checked) {
            element.checked = false
        }
    }
  }
  