package com.toset;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map;
import java.util.Map.Entry;

import com.beans.ArchiveVO;
import com.beans.FolderVO;
import com.beans.UnitVO;
import com.master.beans.common.AbstractBean;

public class ToSet {

	public static void main(String[] args) {

		ToSet t = new ToSet();
		t.doit();

	} // Method

	private void doit() {
		System.out
				.println("########################################################");
		System.out.println("ToSet TranslateTo Entity FLAT ---> Set");
		UnitVO c = new UnitVO();
		c.setDato("UnidadC:");
		c.setValor(151569);
		c.setID("1");

		UnitVO d = new UnitVO();
		d.setDato("UnidadD:");
		d.setValor(151588);
		d.setID("2");

		FolderVO f1 = new FolderVO();
		f1.setDato("Folder1");
		f1.setID("11");
		f1.setUnit(c);

		FolderVO f2 = new FolderVO();
		f2.setDato("Folder2");
		f2.setID("22");
		f2.setUnit(c);

		FolderVO f3 = new FolderVO();
		f3.setDato("Folder3");
		f3.setID("33");
		f3.setUnit(d);

		ArchiveVO a1 = new ArchiveVO();
		a1.setDato("Archive1");
		a1.setID("111");
		a1.setFolder(f1);

		ArchiveVO a2 = new ArchiveVO();
		a2.setDato("Archive2");
		a2.setID("222");
		a2.setFolder(f2);

		ArchiveVO a3 = new ArchiveVO();
		a3.setDato("Archive3");
		a3.setID("333");
		a3.setFolder(f3);

		ArchiveVO a4 = new ArchiveVO();
		a4.setDato("Archive4");
		a4.setID("444");
		a4.setFolder(f1);

		ArchiveVO a5 = new ArchiveVO();
		a5.setDato("Archive5");
		a5.setID("5");
		a5.setFolder(f1);

		ArchiveVO a6 = new ArchiveVO();
		a6.setDato("Archive6");
		a6.setID("666");
		a6.setFolder(f2);

		ArchiveVO a7 = new ArchiveVO();
		a7.setDato("1515151151515");
		a7.setID("999");
		a7.setFolder(f3);

		ArrayList<ArchiveVO> archives = new ArrayList<ArchiveVO>();
		archives.add(a1);
		archives.add(a2);
		archives.add(a3);
		archives.add(a4);
		archives.add(a5);
		archives.add(a6);
		archives.add(a7);

		System.out
				.println("#################  	READY    ############################");
		ArrayList<FolderVO> folders = translateArchivesToFolders(archives);
		ArrayList<UnitVO> units = translateFoldersToUnits(folders);

		for (UnitVO u : units) {
			System.out.println("	UNIDAD");
			System.out.println("	ID: " + u.getID());
			System.out.println("	Code : " + u.getDato());

			List<FolderVO> fs = u.getFolders();

			for (FolderVO f : fs) {
				System.out.println("		FOLDER");
				System.out.println("		ID Folder: " + f.getID());
				System.out.println("		Code Folder : " + f.getDato());

				List<ArchiveVO> ar = f.getArchives();
				for (ArchiveVO a : ar) {
					System.out.println("			ARCHIVE");
					System.out.println("			ID Archive: " + a.getID());
					System.out.println("			Code Archive : " + a.getDato());

				}
				System.out.println("***********");
			}

			System.out.println("+++++++++++++++++++");
		}
	}

	/**
	 * translateArchivesToFolders.
	 * 
	 * @param archives
	 *            ArrayList<ArchiveVO>
	 * @return ArrayList<FolderVO>
	 */
	private ArrayList<FolderVO> translateArchivesToFolders(
			ArrayList<ArchiveVO> archives) {
		ArrayList<FolderVO> result = new ArrayList<FolderVO>();

		Map<String, AbstractBean> map = new HashMap<String, AbstractBean>();

		for (ArchiveVO a : archives) {
			// First time is null
			if (map.get(a.getFolder().getID()) == null) {
				map.put(a.getFolder().getID(), a.getFolder());
			}

			List<ArchiveVO> l = ((FolderVO) map.get(a.getFolder().getID()))
					.getArchives();

			// First time is null
			if (null == l) {
				l = new ArrayList<ArchiveVO>();
			}
			l.add(a);

			((FolderVO) map.get(a.getFolder().getID())).setArchives(l);

		} // for each archive

		// Now I have the full map

		// translate map to list
		Iterator<Entry<String, AbstractBean>> iterator = map.entrySet()
				.iterator();
		while (iterator.hasNext()) {
			Map.Entry<String, AbstractBean> entry = (Map.Entry<String, AbstractBean>) iterator
					.next();

			result.add((FolderVO) entry.getValue());
		}

		return result;
	}

	/**
	 * translateFoldersToUnits.
	 * 
	 * @param archives
	 *            ArrayList<FolderVO>
	 * @return ArrayList<UnitVO>
	 */
	private ArrayList<UnitVO> translateFoldersToUnits(
			ArrayList<FolderVO> folders) {
		ArrayList<UnitVO> result = new ArrayList<UnitVO>();

		Map<String, AbstractBean> map = new HashMap<String, AbstractBean>();

		for (FolderVO a : folders) {
			// First time is null
			if (map.get(a.getUnit().getID()) == null) {
				map.put(a.getUnit().getID(), a.getUnit());
			}

			List<FolderVO> l = ((UnitVO) map.get(a.getUnit().getID()))
					.getFolders();

			// First time is null
			if (null == l) {
				l = new ArrayList<FolderVO>();
			}
			l.add(a);

			((UnitVO) map.get(a.getUnit().getID())).setFolders(l);

		} // for each archive

		// Now I have the full map

		// translate map to list
		Iterator<Entry<String, AbstractBean>> iterator = map.entrySet()
				.iterator();
		while (iterator.hasNext()) {
			Map.Entry<String, AbstractBean> entry = (Map.Entry<String, AbstractBean>) iterator
					.next();

			result.add((UnitVO) entry.getValue());
		}

		return result;
	}
		
	/**
	 * translateFoldersToUnits.
	 * 
	 * @param archives
	 *            ArrayList<FolderVO>
	 * @return ArrayList<UnitVO>
	 */
	private ArrayList<UnitVO> translateFoldersTo(
			ArrayList<FolderVO> folders) {
		ArrayList<UnitVO> result = new ArrayList<UnitVO>();

		Map<String, AbstractBean> map = new HashMap<String, AbstractBean>();

		for (FolderVO a : folders) {
			// First time is null
			if (map.get(a.getUnit().getID()) == null) {
				map.put(a.getUnit().getID(), a.getUnit());
			}

			List<FolderVO> l = ((UnitVO) map.get(a.getUnit().getID()))
					.getFolders();

			// First time is null
			if (null == l) {
				l = new ArrayList<FolderVO>();
			}
			l.add(a);

			((UnitVO) map.get(a.getUnit().getID())).setFolders(l);

		} // for each archive

		// Now I have the full map

		// translate map to list
		Iterator<Entry<String, AbstractBean>> iterator = map.entrySet()
				.iterator();
		while (iterator.hasNext()) {
			Map.Entry<String, AbstractBean> entry = (Map.Entry<String, AbstractBean>) iterator
					.next();

			result.add((UnitVO) entry.getValue());
		}

		return result;
	}
	
}