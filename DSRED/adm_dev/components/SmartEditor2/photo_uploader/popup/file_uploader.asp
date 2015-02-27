<%@ codepage = "65001" %>
<% session.CodePage = "65001" %>
<% response.charset ="UTF-8" %>

<%
	'-----------------------------------------------------------------
	' ALERT ǥ��
	'-----------------------------------------------------------------
	sub Alert(txtmsg)
		txtmsg = replace(txtmsg, "'", "`")
		response.write "<script language='javascript'>"
		response.write "alert('" & txtmsg & "');"
		response.write "</script>"
	end Sub

	'-----------------------------------------------------------------
	' �ش� ��ġ�� ������ ���� �̸��� ���ϴ� �κ�
	' parameter : ������ �̸� (��� ����)
	' parameter : ������ ��� (�̸� ����)
	'-----------------------------------------------------------------
	function get_filename(fname, fpath)
		onlyname = mid(fname, 1, instr(1, fname, ".") - 1)				'������ �̸��� ����
		fullname = fpath & fname										'������ �̸�(��ü���)
		extname = mid(fname, instr(1, fname, ".")+1)

		Set fso = CreateObject("Scripting.FileSystemObject")
	
		exist = true
		count = 0

		do while exist
			If (fso.FileExists(fullname)) Then							' ���� �̸��� ������ ���� ��
				count = count + 1
				fname = onlyname & count & "." & extname			'���ϸ�� ���ڸ� ���� ���ο� ���� �̸� ����
				fullname = fpath & fname								'���ο� �̸��� ��ü��� ����
			Else	'���� �̸��� ������ ���� ��
				exist = False										' ������ �������� �����Ƿ�
'				fullname = fpath & file_name						' ������ �̸�
				get_filename = fname							' �����ͺ��̽��� ������ �̸�
			End If
		loop
		set fso = nothing	
	end Function

defaultPath = Server.MapPath("/uploadFiles/contents") 


'�ѱ۸� ������ ���ε� �����ʴ´�.


Set theform = Server.CreateObject("Dext.FileUpload")
	theform.DefaultPath = server.mappath("/uploadFiles/contents") 
	theform.MaxFileLen = 1024*1024*50
	theform.CodePage = 65001

url = "./callback.html" & "?callback_func=" & theform("callback_func")    



		if theform("Filedata") <> "" Then

			file_image_width  = theform("Filedata").Imagewidth	'�̹��� ���� ������ ���ϱ�
			file_image_height = theform("Filedata").ImageHeight	'�̹��� ���� ������ ���ϱ�

			ext_only = Mid(replace(theform("Filedata").FileName," ",""), instrrev(replace(theform("Filedata").FileName," ",""), ".")+1)
			nimg = "fs_" & year(now) & month(now) & day(now) & minute(now) & second(now)+i & "." & ext_only

			mimetype = theform("Filedata").MimeType
			if theform("Filedata").FileLen  > 1024*1024*5 then
				url = url & "&errstr=File size is over  "
				response.redirect url
			end if

			isavename = get_filename (nimg, defaultPath)

			theform("Filedata").SaveAs theform.DefaultPath&"\"&isavename, False					' ȭ���� ����(���ε�, �ӽ� ���� ������)
		'response.write isavename
		'response.end
		end if


url = url & "&bNewLine=true"
url = url & "&sFileName="& server.URLencode(isavename)
url = url & "&sFileURL=/uploadFiles/contents/" & server.URLencode(isavename)
'response.write url 
response.redirect url
%>


