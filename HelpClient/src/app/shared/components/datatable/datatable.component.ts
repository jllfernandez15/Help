import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

import { PagedResponse } from 'src/app/core/models/common/paged/PagedResponse';
import { Entity } from 'src/app/core/models/common/Entity';

@Component({
  selector: 'app-datatable',
  templateUrl: './datatable.component.html',
  styleUrls: ['./datatable.component.scss']
})
export class DatatableComponent implements OnInit {
  @Input() columnas: Array<any>;
  @Input() hiddensButtons: Array<boolean>;
  @Input() dataSource: PagedResponse;

  @Input() titulo: string;
  @Input() tableFoot: string;
  @Input() target: string;
  
  @Output() clickedRow = new EventEmitter<string>();
  @Output() editedRow = new EventEmitter<string>();
  @Output() deletedRow = new EventEmitter<string>();

  del: boolean;
  edit: boolean;

  constructor() {}

  ngOnInit() {
    this.edit = this.hiddensButtons[0];
    this.del = this.hiddensButtons[1];
  }

  onRowClicked(row: any) {
    //console.log('Row clicked: ', row);
    this.clickedRow.emit(row);
  }

  onRowEdited(row: any) {
    //console.log('Row clicked: ', row);
    this.editedRow.emit(row);
  }

  onRowDeleted(row: any) {
    //console.log('Row clicked: ', row);
    this.deletedRow.emit(row);
  }

}

