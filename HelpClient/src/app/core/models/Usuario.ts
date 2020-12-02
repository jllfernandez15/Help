import { Entity } from './common/Entity';
import { Role } from './Role';

export class Usuario extends Entity {
 
    
    login: string;
    pass:string;

    role:Role;

    static fill(tok: string): Usuario{
      let usuario = new Usuario();
     // token.access_token = tok;
      return usuario;
    }

  }