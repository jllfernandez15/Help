package es.malaga.diputacion.ae.help.modelos.entity;

import java.io.Serializable;
import java.sql.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;
import javax.validation.constraints.NotEmpty;
import javax.validation.constraints.Size;

@Entity
@Table(name = "USUARIOS", schema = "MASTER")
public class Usuario implements Serializable {

	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "SEQ_USUARIOS")
	// @SequenceGenerator(sequenceName = "SEQ_USUARIOS", allocationSize = 1, name =
	// "SEQ_USUARIOS")
	// @GeneratedValue(strategy = GenerationType.SEQUENCE)
	private Long id;

	@NotEmpty(message = " no puede estar vacio")
	@Size(min = 4, max = 12, message = " no puede estar vacio")
	@Column(nullable = false)
	private String login;

	// @Column(name = "PASS")
	// , columnDefinition = "VARCHAR")
	private String pass;

	/** persistent field */
	//// @ManyToOne(targetEntity = Role.class, fetch = FetchType.LAZY, optional =
	//// true)
	// @JoinColumn(name = "id")
	// @Column(name = "ID_ROLE")
	@ManyToOne
	@JoinColumn(name = "ID_ROLE")
	private Role role;

	//@Column(nullable = false)
	//private Date birth_date;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getLogin() {
		return login;
	}

	public void setLogin(String login) {
		this.login = login;
	}

	public String getPass() {
		return pass;
	}

	public void setPass(String pass) {
		this.pass = pass;
	}

	public Role getRole() {
		return role;
	}

	public void setRole(Role role) {
		this.role = role;
	}
/*
	public Date getBirth_date() {
		return birth_date;
	}

	public void setBirth_date(Date birth_date) {
		this.birth_date = birth_date;
	}
*/
	private static final long serialVersionUID = 1L;

}
