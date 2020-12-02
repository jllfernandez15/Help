import { Entity } from './common/Entity';
import { Capability } from './Capability';
import { Usuario } from './Usuario';

export class Role extends Entity {
    
    code: string;
    descr:string;

    usuarios: Usuario[];

    capabilitys:Capability[];
  }