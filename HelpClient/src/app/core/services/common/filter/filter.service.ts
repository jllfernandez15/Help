import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';

import { PagedRequest } from '../../../models/common/paged/PagedRequest';

@Injectable({
  providedIn: 'root'
})
export class FilterService {

  private filterSource = new BehaviorSubject(new PagedRequest());
  currentFilter = this.filterSource.asObservable();

  private source: PagedRequest;

  constructor() { }

  setFilter(filter: PagedRequest) {
    this.filterSource.next(filter);
  }
  
  getSource() : PagedRequest {
    return this.source;
  }

}
