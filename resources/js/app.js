import './bootstrap';
import flatpickr from "flatpickr";  
import "flatpickr/dist/flatpickr.min.css";  
import { Latvian } from "flatpickr/dist/l10n/lv.js";  
document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#start_date", {
      locale: Latvian, 
      dateFormat: "d.m.Y",  
      minDate: "today",
    });
  
    flatpickr("#end_date", {
      locale: Latvian, 
      dateFormat: "d.m.Y",
      minDate: "today",
    });
  });
  
