import { TestBed } from '@angular/core/testing';

import { DataVehiculoService } from './data-vehiculo.service';

describe('DataVehiculoService', () => {
  let service: DataVehiculoService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DataVehiculoService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
