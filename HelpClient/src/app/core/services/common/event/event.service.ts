import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class EventService {

  private eventSource = new BehaviorSubject(new Number());
  currentEvent = this.eventSource.asObservable();

  constructor() { }

  setEvent(event: Number) {
    this.eventSource.next(event);
  }
}

/*
  ngOnInit() {
    this.eventService.currentEvent.subscribe(model => this.event = event);
    console.log(this.event);
  }
  setEvent 
  this.eventService.setEvent(event.data);
  */